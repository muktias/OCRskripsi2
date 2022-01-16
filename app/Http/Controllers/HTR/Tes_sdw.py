import cv2
import numpy as np
from skimage import io, morphology, color, img_as_float, segmentation
from scipy import ndimage as ndi
import matplotlib.pyplot as plt

img = cv2.imread(r'C:\Users\MuktiAS\SKRIPSI\UI\bismillahUI\public_html\obat\obat.png')
# gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
# blur = cv2.GaussianBlur(gray, (25,25), 0)
# thresh = cv2.threshold(blur, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)[1]


eroded_img = cv2.erode(img, np.ones((7,7), np.uint8)) 
bg_img = cv2.medianBlur(eroded_img, 299)

cv2.imwrite(r'C:\Users\MuktiAS\SKRIPSI\UI\bismillahUI\public_html\obat\ero.png', eroded_img)
cv2.imwrite(r'C:\Users\MuktiAS\SKRIPSI\UI\bismillahUI\public_html\obat\bg.png', bg_img)
diff_img = 255 - cv2.absdiff(eroded_img, bg_img)
dil_img=cv2.dilate(diff_img, np.ones((3,3), np.uint8)) 
# ero_img = cv2.erode(diff_img, np.ones((7,7), np.uint8)) 
cv2.imwrite(r'C:\Users\MuktiAS\SKRIPSI\UI\bismillahUI\public_html\obat\obat.png', dil_img)

# rgb_planes = cv2.split(img)
# result_planes = []
# result_norm_planes = []
# for plane in rgb_planes:
#     dilated_img = cv2.dilate(plane, np.ones((9,9), np.uint8))
#     bg_img = cv2.medianBlur(dilated_img, 21)
#     diff_img = 255 - cv2.absdiff(plane, bg_img)
#     norm_img = cv2.normalize(diff_img,None, alpha=0, beta=255, norm_type=cv2.NORM_MINMAX, dtype=cv2.CV_8UC1)
#     # result_planes.append(diff_img)
#     result_norm_planes.append(norm_img)
# # result = cv2.merge(result_planes)
# result_norm = cv2.merge(result_norm_planes)

# cv2.imwrite(r'C:\Users\MuktiAS\SKRIPSI\UI\bismillahUI\public_html\obat\obat.png', result_norm)