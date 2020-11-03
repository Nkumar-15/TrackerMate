# facerec.py
import cv2, sys, numpy, os
import app1
global num

def face():
    count=0
    arr=[]
    size = 4
    haar_file = 'haarcascade_frontalface_default.xml'
    datasets = 'datasets'
    print('Recognizing Face Please Be in sufficient Light Conditions...')
    (images, lables, names, id) = ([], [], {}, 0)
    for (subdirs, dirs, files) in os.walk(datasets):
        for subdir in dirs:
            names[id] = subdir
            subjectpath = os.path.join(datasets, subdir)
            for filename in os.listdir(subjectpath):
                path = subjectpath + '/' + filename
                lable = id
                images.append(cv2.imread(path, 0))
                lables.append(int(lable))
            id += 1
    (width, height) = (130, 100)

 
    (images, lables) = [numpy.array(lis) for lis in [images, lables]]

    
    model = cv2.face.LBPHFaceRecognizer_create()
    model.train(images, lables)

    face_cascade = cv2.CascadeClassifier(haar_file)
    webcam = cv2.VideoCapture(0)
    while True:
        count=count+1
        (_, im) = webcam.read()
        gray = cv2.cvtColor(im, cv2.COLOR_BGR2GRAY)
        faces = face_cascade.detectMultiScale(gray, 1.3, 5)
        for (x,y,w,h) in faces:
            cv2.rectangle(im,(x,y),(x+w,y+h),(255,0,0),2)
            face = gray[y:y + h, x:x + w]
            face_resize = cv2.resize(face, (width, height))
            # Try to recognize the face
            prediction = model.predict(face_resize)
            cv2.rectangle(im, (x, y), (x + w, y + h), (0, 255, 0), 3)

            if prediction[1]<500:
                cv2.putText(im,'%s - %.0f' % (names[prediction[0]],prediction[1]),(x-10, y-10), cv2.FONT_HERSHEY_PLAIN,1,(0, 255, 0))
                arr.append(names[prediction[0]])
            else :
                cv2.putText(im,'not recognized',(x-10, y-10), cv2.FONT_HERSHEY_PLAIN,1,(0, 255, 0))

        cv2.imshow('OpenCV', im)
        
        key = cv2.waitKey(10)
        if count==40:
            break
    count1=0
    try:
        num=arr[0]    
        for i in arr:
            accurrences=arr.count(i)
            if(count1<accurrences):
                count1=accurrences
                num=i
        return num
    except IndexError:
        return 0   





