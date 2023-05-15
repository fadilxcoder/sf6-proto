# Notes

- Comparing 2 images to check matching (https://github.com/fadilxcoder/face-recognition.git)

```bash
λ php bin/console app:image:recognition


 [OK] {"faces": 1, "match": true, "coordinates": [662, 118, 439, 341]}

```

- OCR - Reading text from image (https://github.com/fadilxcoder/ocr-image-to-text.git)

```bash
λ php bin/console app:image:text

 ! [NOTE] JAMES SMITH
 !        SALES MANAGER
 !
 !        & 123123 123
 !
 !        = jamessmith@spc.com
 !
 !        yww.spc.com

 ! [NOTE] n<2>9-| Uxbridge
 !        University
 !        London
 !
 !        | STUDENT CARD
 !        | Expires 05/09/2023
 !
 !        |IDNumber 2001827384
 !
 !        Christopher Jones DOB: 10/09/1995
 !        BA Honours Business Management

 ! [NOTE] Lorem Ipsum is simply dummy text
 !
 !        Why do we use it?


 [OK] OCR successfully terminated.

```