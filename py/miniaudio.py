import speech_recognition as sr
print(sr.__version__)
r = sr.Recognizer()

file_audio = sr.AudioFile('audio1.wav')

with file_audio as source:
   audio_text = r.record(source)

print("start")

text = r.recognize_google(audio_text)

f = open("test.txt", "a")
f.write("text: "+text)
f.close()

print(type(audio_text))
print("finish")


