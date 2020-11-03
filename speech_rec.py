import speech_recognition as sr
def speech_pred():

    r = sr.Recognizer()

    with sr.Microphone() as source:
        print('Speak Anything:')
        audio = r.listen(source)
        num =0
        try:
            text = r.recognize_google(audio)
            print('You said : {}'.format(text))
            if(text == "canteen"):
                num =3
                return num
            elif(text == "b"):
                num=2
                return num
            elif(text== "medical"):
                num=4
                return num
            elif(text == "gym"):
                num=5
                return num

            # topic={"introduction":0.5,"matrix":1.35,"list":4.30,"tuples":6.15,"dictionary":7.45}
            # num=0
            # for i in topic:
            #     if i==text:
            #         if(topic[i] == "canteen"):
            #             num=3
            #             print(num)
            #             return num
            #         if(topic[i] == "b"):
            #             num =2
            #             return num
            #         if(topic[i] == "a"):
            #             num =1
            #             return num
                   
        except:
            # print('Sorry could not recognize your voice')
            return num