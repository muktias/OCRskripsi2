from PIL import Image, ImageEnhance 
from cv2 import cv2
import skimage.filters
import skimage.color
import skimage.io
import matplotlib.pyplot as plt

img = Image.open(r'C:\Users\MuktiAS\SKRIPSI\UI\bismillahUI\public_html\obat\obat.png')
panjang = img.width
tinggi = img.height


if img.height>img.width :
    img = img.rotate(90, expand=True)
    img = img.resize((tinggi, panjang), Image.ANTIALIAS)
    


image = skimage.io.imread(r'C:\Users\MuktiAS\SKRIPSI\UI\bismillahUI\public_html\obat\obat.png')
blur = skimage.color.rgb2gray(image)

t = skimage.filters.threshold_otsu(blur)
t = round(t*255)
# retval	=	cv2.BackgroundSubtractorMOG2.getShadowThreshold(img)
print('Threshold = ' , t)
# print('Shadow = ' , retval)

thresh = t
fn = lambda x : 255 if x > thresh else 0
gambar = img.convert('L').point(fn, mode='1')

if gambar.width>1080 :
    ratio = 1080/gambar.width
    h = round(gambar.height*ratio)
    gambar = gambar.resize((1080, h))

gambar.save(r'C:\Users\MuktiAS\SKRIPSI\UI\bismillahUI\public_html\obat\obat.png')


# img = Image.open(r'C:\Users\MuktiAS\SKRIPSI\UI\bismillahUI\public_html\obat\obat.png')

# enhancer1 = ImageEnhance.Color(img).enhance(0.5)
# enhancer2 = ImageEnhance.Sharpness(enhancer1).enhance(0.1)
# enhancer3 = ImageEnhance.Contrast(enhancer2).enhance(2.0)

# # plt.imshow(r)
# enhancer3.save(r'C:\Users\MuktiAS\SKRIPSI\UI\bismillahUI\public_html\obat\obat.png')

# img = cv2.imread(r'C:\Users\MuktiAS\SKRIPSI\UI\bismillahUI\public_html\obat\obat.png')
# gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
# gray = cv2.adaptiveThreshold(gray,255,cv2.ADAPTIVE_THRESH_GAUSSIAN_C,cv2.THRESH_BINARY,11,2)

# cv2.imwrite("obat.png", img)