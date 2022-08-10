### Instalasi

Langkah awal yang perlu dilakukan adalah melakukan cloning pada repository ini, baik dengan didownload maupun menggunakan github clone.

Kemudian lakukan instalasi dependensi package dari laravel dengan menggunakan composer. Sebagai catatan karena project menggunakan laravel versi 9, maka membutuhkan php versi 8.

```
composer install
```

(Anda perlu menyesuaikan konfigurasi pada file environment (.env)), yaitu nama *host, port, user, password, dan nama database*.

Kemudian lakukan migrasi serta seeding untuk membentuk tabel database dan menambahkan fake data dalam autentikasi.

```
php artisan migrate
```

```
php artisan db:seed
```

### Fetch Data

Untuk melakukan fetch data dari RajaOngkir dapat menjalankan perintah artisan yang telah dibuat, yaitu:

```
php artisan fetch:rajaongkir
```

### Menjalankan

Untuk menjalankan project pada local developemnt server dapat dilakukan dengan perintah berikut pada terminal:

```
php artisan serve
```

### Penggunaan

Untuk menggunakannya, anda dapat menggunakan postman untuk mengakses endpoint yang dibuat. Dalam penggunaannya, akses terhadap seluruh endpoint perlu authentikasi terlebih dahulu. Authentikasi dilakukan dengan menyisipkan beberapa parameter pada header.

```
key -> value
username = faisol
password = faisol
```

Untuk melakukan pencarian provinsi anda dapat mengakses *endpoint* berikut:

```
http://localhost:8000/search/provinces?id={id}
```

Sedangkan untuk mencari kota dapat mengakses *endpoint* berikut:

```
http://localhost:8000/search/cities?id={id}
```

### Swapable Implementation

Untuk mengambil sumber data dari database konfigurasi environtment (.env) dapat ditentukan dengan:

```
DATA_SOURCE = db
```

Jika ingin mengambil dari direct API, maka environment:

```
DATA_SOURCE = direct
```

### Unit Testing

Untuk menjalankan unit testing dapat dilakukan dengan perintah:

```
php artisan test
```

