# kutubxonalarni import qilish
import speech_recognition as sr

import os

from pydub import AudioSegment
from pydub.silence import split_on_silence


# audio faylni qismlarga ajratuvchi funksiya
# va nutqni aniqlashni qo'llaydi
def silence_based_conversion(path = "audio.wav"):

    # saqlangan audio faylni oching
    # mahalliy tizim wav fayli sifatida.
    song = AudioSegment.from_wav(path)

    # biz birlashtiradigan faylni oching
    # va taniqli matnni saqlang
    fh = open("test.txt", "w+")
        
    # bo'lingan trek, bu erda sukunat 0,5 soniya
    # yoki undan ko'p va bo'laklarga ega bo'ling
    chunks = split_on_silence(song,

        # kamida 0,5 soniya jim turishi kerak
        # yoki 500 ms. bu qiymatni foydalanuvchiga qarab sozlang
        # talab. agar gapiruvchi jim tursa
        # uzunroq, bu qiymatni oshiring. aks holda, kamaytiring.
        min_silence_len = 500,

        # -16 dBFS dan jim bo'lsa, uni jim deb hisoblang
        # buni talablarga moslashtiring
        silence_thresh = -16
    )

    # audio qismlarni saqlash uchun katalog yaratish.
    try:
        os.mkdir('audio_chunks')
    except(FileExistsError):
        pass

    # ga katalogga o'ting
    # audio fayllarni saqlang.
    os.chdir('audio_chunks')

    i = 0
    # har bir bo'lakni qayta ishlash
    for chunk in chunks:
            
        # 0,5 soniya jim bo'lakni yarating
        chunk_silent = AudioSegment.silent(duration = 10)

        # boshiga 0,5 soniya sukunat qo'shing va
        # audio qismning oxiri. Bu shunday qilingan
        # bu keskin kesilganga o'xshamaydi.
        audio_chunk = chunk_silent + chunk + chunk_silent

        # export audio chunk and save it in
        # the current directory.
        print("saving chunk{0}.wav".format(i))
        # specify the bitrate to be 192 k
        audio_chunk.export("./chunk{0}.wav".format(i), bitrate ='192k', format ="wav")

        # the name of the newly created chunk
        filename = 'chunk'+str(i)+'.wav'

        print("Processing chunk "+str(i))

        # get the name of the newly created chunk
        # in the AUDIO_FILE variable for later use.
        file = filename

        # create a speech recognition object
        r = sr.Recognizer()

        # recognize the chunk
        with sr.AudioFile(file) as source:
            # remove this if it is not working
            # correctly.
            r.adjust_for_ambient_noise(source)
            audio_listened = r.listen(source)

        try:
            # try converting it to text
            rec = r.recognize_google(audio_listened)
            # write the output to the file.
            fh.write(rec+". ")

        # catch any errors.
        except sr.UnknownValueError:
            print("Could not understand audio")

        except sr.RequestError as e:
            print("Could not request results. check your internet connection")

        i += 1

    os.chdir('..')


if __name__ == '__main__':
        
    print('Enter the audio file path')

    silence_based_conversion()
