
import os
from cv2 import cv2
import random
import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
import h5py
import glob
from PIL import Image

import tensorflow as tf
from keras import backend as K
from keras.models import Model
from keras.layers import Input, Conv2D, MaxPooling2D, Reshape, Bidirectional, LSTM, Dense, Lambda, Activation, BatchNormalization, Dropout
from keras.optimizers import Adam

from keras.models import load_model
from keras.preprocessing import image
import string
from collections import defaultdict
from collections import Counter 

from scipy.ndimage import interpolation as inter

from fuzzywuzzy import fuzz
from fuzzywuzzy import process

from Levenshtein import distance
import sys, io
import datetime


def correct_skew(image):
 # Compute rotated bounding box
    thresh = cv2.threshold(image, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)[1]
    coords = np.column_stack(np.where(thresh == 0))
    angle = cv2.minAreaRect(coords)[-1]

    if angle < -45:
        angle = -(90 + angle)
    else:
        angle = -angle

    # Rotate image to deskew
    (h, w) = image.shape[:2]
    center = (w // 2, h // 2)
    M = cv2.getRotationMatrix2D(center, angle, 1.0)
    rotated = cv2.warpAffine(image, M, (w, h), flags=cv2.INTER_CUBIC, borderMode=cv2.BORDER_REPLICATE)
    return rotated
  
def possible_wordsF(fwords, charSet): 
    guessed = list()
    scale1 = 0
    scale2= 0
    scale3 = 0
    for word in fwords: 
        scale2 = fuzz.ratio(word,charSet)
        if scale2 >= scale1 :
            scale1 = scale2
    for word in fwords: 
        scale3 = fuzz.ratio(word,charSet)
        if scale3 == scale1 :
                guessed.append(word)
                
    print("Content-type:text/plain;charset=utf-8\n\n") 
    print("\n Probably : \n")
    print(guessed)


def possible_wordsL(lwords, charSet): 
    guessed = list()
    scale1 = len(charSet)
    scale2= 0
    scale3 = 0
    for word in lwords: 
        scale2 = distance(word,charSet)
        if len(word)>len(charSet) : 
            scale2 = distance(word[0:len(charSet)-1],charSet)
        if scale2 <= scale1 :
               scale1 = scale2
    for word in lwords: 
        scale3 = distance(word,charSet)
        if len(word)>len(charSet) : 
            scale3 = distance(word[0:len(charSet)-1],charSet)
        if scale3 == scale1 :
                guessed.append(word)
    guessed = '\n'.join(guessed)
    br0 = r'<pre style="font-size: 24px; font-weight: bold;">'
    br1 = r'<pre style="font-size: 24px; font-weight: bold; height: 10pc; overflow-y: scroll;">'
    br2 = r'</pre>'
    print(br0+" Possible strings : \n"+br2)
    print(br1,guessed,br2)
        
        
  
if __name__ == "__main__": 

    # characters = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
    #               'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f',
    #               'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z']
    characters = [ 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
                    'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
                    ,'a','b','d','e','f','g','h','n','q','r','t']

    # enter input image here
    img = cv2.imread(r'C:\Users\MuktiAS\SKRIPSI\UI\bismillahUI\public_html\obat\obat.png')
    image = cv2.medianBlur(img,7)
    # image = cv2.transpose(image) 
    # image = np.asarray(image) # convert from integers to floats 
    # image = image.astype('float32') # normalize to the range 0-1 img /= 255.0
    # image = cv2.imread(r'C:\Users\MuktiAS\SKRIPSI\emnist_recog\bw\putra1.jpeg')
    height, width, depth = image.shape

    # resizing the image to find spaces better
    image = cv2.resize(image, dsize=(width * 5, height * 4), interpolation=cv2.INTER_CUBIC)
    # grayscale
    gray = cv2.cvtColor(image, cv2.COLOR_BGR2GRAY)
    # gray = cv2.adaptiveThreshold(gray,255,cv2.ADAPTIVE_THRESH_GAUSSIAN_C,cv2.THRESH_BINARY,11,2)
    # binary
    ret, thresh = cv2.threshold(gray, 127, 255, cv2.THRESH_BINARY_INV)
    #compute a bit-wise inversion so black becomes white and vice versa
    # thresh = np.invert(thresh)

    # dilation
    kernel = np.ones((1, 1), np.uint8)
    img_dilation = cv2.dilate(thresh, kernel, iterations=1)

    # adding GaussianBlur
    gsblur = cv2.GaussianBlur(img_dilation, (5, 5), 0)
    # gsblur = cv2.medianBlur(img_dilation, 9)

    # find contours
    ctrs, hier = cv2.findContours(gsblur.copy(), cv2.RETR_EXTERNAL, cv2.CHAIN_APPROX_SIMPLE)

    m = list()
    # sort contours
    sorted_ctrs = sorted(ctrs, key=lambda ctr: cv2.boundingRect(ctr)[0])
    pchl = list()
    dp = image.copy()
    for i, ctr in enumerate(sorted_ctrs):
        # Get bounding box
        area = cv2.contourArea(ctr)
        # if area > 10000:
        x, y, w, h = cv2.boundingRect(ctr)
        cx = x+w//2
        cy = y+h//2
        cr  = max(w,h)//2
        r = cr+10
        cv2.rectangle(dp, (cx-r, cy-r), (cx+r, cy+r), (90, 0, 255), 9)
        

    plt.imshow(dp)
    plt.savefig(r'C:\Users\MuktiAS\SKRIPSI\UI\bismillahUI\public_html\obat\obat.png', bbox_inches='tight')



    # Recreate the exact same model, including its weights and the optimizer
    from keras.models import load_model
    from keras.models import model_from_json

    # json_file = open(r'\Users\MuktiAS\SKRIPSI\UI\bismillahUI\app\Http\Controllers\HTR\model95.json')
    # json_file = open(r'\Users\MuktiAS\SKRIPSI\UI\bismillahUI\app\Http\Controllers\HTR\modelDG96In.json')
    # json_file = open(r'\Users\MuktiAS\SKRIPSI\UI\bismillahUI\app\Http\Controllers\HTR\modelDG97InTr.json')
    # json_file = open(r'\Users\MuktiAS\SKRIPSI\UI\bismillahUI\app\Http\Controllers\HTR\modelDG978FlTr.json')
    json_file = open(r'\Users\MuktiAS\SKRIPSI\UI\bismillahUI\app\Http\Controllers\HTR\tesub.json')
    loaded_model_json = json_file.read()
    json_file.close()
    loaded_model = model_from_json(loaded_model_json)
    # loaded_model.load_weights(r'\Users\MuktiAS\SKRIPSI\UI\bismillahUI\app\Http\Controllers\HTR\model95.h5')
    # loaded_model.load_weights(r'\Users\MuktiAS\SKRIPSI\UI\bismillahUI\app\Http\Controllers\HTR\modelDG96In.h5')
    # loaded_model.load_weights(r'\Users\MuktiAS\SKRIPSI\UI\bismillahUI\app\Http\Controllers\HTR\modelDG97InTr.h5')
    # loaded_model.load_weights(r'\Users\MuktiAS\SKRIPSI\UI\bismillahUI\app\Http\Controllers\HTR\modelDG98FlTr.h5')
    loaded_model.load_weights(r'\Users\MuktiAS\SKRIPSI\UI\bismillahUI\app\Http\Controllers\HTR\tesub.h5')
    model = loaded_model
    # model = load_model(r'C:\Users\MuktiAS\SKRIPSI\emnist_recog\dokumentasi\model.h5')
    # model.load_weights(r'C:\Users\MuktiAS\SKRIPSI\emnist_recog\dokumentasi\model_weights.h5')
    # model.summary()

    for i, ctr in enumerate(sorted_ctrs):
        # Get bounding box
        area = cv2.contourArea(ctr)
        # if area > 10000:
        x, y, w, h = cv2.boundingRect(ctr)
        cx = x+w//2
        cy = y+h//2
        cr  = max(w,h)//2
        r = cr+10
        # Getting ROI
        roi = image[(1 if(cy-r) <= 0 else (cy-r)):cy+r, (1 if(cx-r) <= 0 else (cx-r)):cx+r]
        # (1 if(cy-r) <= 0 else (cy-r)):cy + h + 10, (1 if(cx-r) <= 0 else (cx-r)):cx + w + 10
        roi = cv2.resize(roi, dsize=(28, 28), interpolation=cv2.INTER_CUBIC)
        roi = cv2.cvtColor(roi, cv2.COLOR_BGR2GRAY)
        roi1 = cv2.bitwise_not(roi)
        path = 'C:/Users/MuktiAS/SKRIPSI/UI/bismillahUI/public_html/kontur/'
        nama = datetime.datetime.now().strftime("%Y-%m-%d %H-%M-%S-%f")
        # print(nama)
        cv2.imwrite(os.path.join(path , nama+'.png'), roi1)
        # roi = correct_skew(roi)

        roi = np.array(roi)
        t = np.copy(roi)
        t = t / 255.0
        t = 1 - t
        t = t.reshape(1, 28,28)
        m.append(roi)
        pred = np.argmax(model.predict(t.round()), axis=-1)
        pchl.append(pred)

    pcw = list()
    interp = 'bilinear'
    # fig, axs = plt.subplots(nrows=len(sorted_ctrs), sharex=True, figsize=(1, len(sorted_ctrs)))
    for i in range(len(pchl)):
        # print (pchl[i][0])
        pcw.append(characters[pchl[i][0]])
        # axs[i].set_title('-------> predicted letter: ' + characters[pchl[i][0]], x=2.5, y=0.24)
        # axs[i].imshow(m[i], interpolation=interp)

    # plt.show()

    predstring = ''.join(pcw)
    print('Identified String: ' + predstring )
    print('\n')

    tebak = list(predstring)
    # charSet = list(set(tebak))
    # charSet.sort()
    # print(charSet)
    print('\n')

    with open(r'\Users\MuktiAS\SKRIPSI\UI\bismillahUI\app\Http\Controllers\HTR\all_medicine_names.txt') as f:
    # with open(r'\Users\MuktiAS\SKRIPSI\UI\bismillahUI\app\Http\Controllers\HTR\300_obat.txt') as f:
        input = [line.strip() for line in f]
    # print(input)
    
    # possible_wordsF(input, tebak)
    possible_wordsL(input, predstring)