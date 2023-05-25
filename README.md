# TP3DPBO2023C1

## Janji
Saya Farhan Muzhaffar Tiras Putra NIM 2105879 mengerjakan soal Tugas Praktikum 3 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Soal
Buatlah program menggunakan bahasa pemrograman PHP dengan spesifikasi sebagai berikut:
- Program bebas, kecuali program Ormawa
- Menggunakan minimal 3 buah tabel
- Terdapat proses Create, Read, Update, dan Delete data
- Memiliki fungsi pencarian dan pengurutan data (kata kunci bebas)
- Menggunakan template/skin form tambah data dan ubah data yang sama
- 1 tabel pada database ditampilkan dalam bentuk bukan tabel, 2 tabel sisanya ditampilkan dalam bentuk tabel (seperti contoh saat praktikum)
- Menggunakan template/skin tabel yang sama untuk menampilkan tabel

## Desain Database
![Desain DB](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/1e3073cc-dfaa-4f29-9ad5-f3e91ab38987)

## Alur Program
- Home
  - User dapat melihat daftar karakter di bagian home yang berbentuk card
  - User bisa sort karakter bedasarkan nama secara ascending ataupun descending, dengan memilihnya di dropdown option dan klik tombol sort
  - User bisa mencari karakter dengan menggunakan field search yang ada di kanan atas. Setelah menuliskan namanya user akan diperlihatkan karakter yang memiliki nama yang dicari
  - User dapat klik karakter untuk membuka detail karakter tersebut
- Detail
  - User dapat melihat detail dari karakter yang dipilih. Informasi yang ada yaitu, Nama, HP, ATK, DEF, Path, Element, dan foto karakter
  - User dapat menghapus karakter disini
    - User klik tombol hapus data
    - Query hapus akan dijalankan
    - Akan dikembalikan ke home
  - User dapat update karakter dengan klik tombol ubah data
    - User diarahkan ke form update
    - User diminta untuk mengubah data yang diinginkan
    - Jika dirasa sudah benar maka user bisa klik tombol update
    - Query update akan dijalankan
    - Akan dikembalikan lagi ke home
- Tambah Karakter
  - User akan diarahkan ke form add
  - User akan diminta untuk memasukkan data karakter yang ingin ditambahkan
  - User klik tombol Add
  - Query insert akan dijalankan
  - User dikembalikan ke home
- Daftar Path
  - Disini bisa melihat daftar dari path yang berbentuk table
- Daftar Element
  - Disini bisa melihat daftar dari element yang berbentuk table


## Dokumentasi
- Daftar Karakter

![Daftar Karakter](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/22cff6ec-a709-4951-bd99-6926eaf7db91)

- Detail Karakter

![Detail](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/4f75f85e-bf44-42ce-8e21-2df416086bdc)

- Daftar Element

![Daftar Element](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/89471ad9-ef93-4cac-ac8b-6ac23ac63af0)

- Daftar Path

![Daftar Path](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/f282f321-cae3-44d9-88bd-df0984035403)

- Add

![Add1](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/8d6cb2c7-828f-4566-a093-e6872c40b27f)

![Add2](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/7096632c-879c-483f-8631-398fb5a81cca)

- Delete

![Del1](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/7e0051c9-403d-4ac7-859b-0e65e88e6634)

![del2](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/1f998d85-2537-4b5a-91f9-b9ffc3fd2b2f)

- Update

![Update1](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/87450f2b-deef-4028-9995-1c2dc22449a8)

![Update2](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/8470b0d2-9c32-4577-96ee-052c3de0e622)

![Update3](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/c63b5179-ae4b-4c16-afec-591043afffab)

- Sort
  - Ascending
  
  ![ASC](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/baedcbd9-1972-4128-9448-e62d15bcaa0b)

  - Descending

  ![DESC](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/a7cb3cc8-a344-4a2a-9b71-fba3ab88fd75)

- Search

![Search1](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/59596ee5-d79b-4adf-b4bd-04b8555ba25f)

![Search2](https://github.com/Hanhan73/TP3DPBO2023C1/assets/96176429/a507cf9d-a315-4176-8458-20808b699317)
