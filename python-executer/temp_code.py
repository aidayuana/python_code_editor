def categorize_age(age):
    if age < 13:
        return "Anak-anak"
    elif age < 18:
        return "Remaja"
    elif age < 60:
        return "Dewasa"
    else:
        return "Lansia"

# Contoh penggunaan fungsi dengan beberapa umur yang telah ditentukan
ages = [10, 16, 25, 65]

# Menjalankan fungsi untuk setiap umur dalam list dan mencetak hasilnya
for age in ages:
    category = categorize_age(age)
    print(f"Usia {age} tahun berkategori sebagai: {category}")
