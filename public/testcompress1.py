import os
import subprocess
import sys

vid = (sys.argv[1]).replace("/","\\")
l=[]
l = vid.split('\\')
vid_name = l[len(l)-1]
subdirs = 'C:/Users/Public'
media_out = subdirs + "/compressed_folder/" + 'compressed_' + vid_name

if not os.path.exists(subdirs + "/compressed_folder"):
    os.makedirs(subdirs + "/compressed_folder")

subprocess.run("ffmpeg -i " + vid  +
                         ' -vcodec libx264 -crf 22 -vf scale=640:480 ' +  media_out.replace(" ", "\\ "), shell=True)
