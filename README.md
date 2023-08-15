Login Account :
    Admin
    Validator
    Petugas

    //DONE
    
NAVBAR :
    Notifikasi (hanya masuk ke Validator dan Petugas)
        Petugas ( New Order & New Revision )
        Validator ( New Validation & New Revision )
        User
        Username & Roles

    //DONE
        
SIDEBAR :
    Admin
    Validator (Dashboard (Table), Validasi (Validator) )
    Petugas ( Dashboard (Table), Validasi (Petugas))

    //DONE
    
DASHBOARD / table :
    Waktu realtime
    tabel otomatis mengikuti waktu realtime
    Filter waktu (Bulan, Tahun)
    apabila filter tidak menghasilkan data, maka nilai tabel 0
    Data Export Excel
    
    -Tabel Index / Dashboard
        Jumlah = Data yang masuk
        OK = Data tanpa revisi
        NOTOK = Data revisi
        Target = Target yang dicapai / bulan
        Hasil % = Jumlah / OK
        UPLOAD % = OK + NOK : Target (cnth : 75 + 25 (100): 75 = 125%)
        VALID % = UPLOAD / OK
        
DASHBOARD / data pelanggan :
    setelah membuat data pelanggan, otomatis data akan dikirimkan ke petugas
    
    VALIDASI / petugas : Tabel Petugas (Data masuk dari Admin)
        Kirim Gambar            
        Kirim catatan
        
    VALIDASI / validator : Tabel Validator (Data masuk dari Petugas)
        Terima gambar
        Terima catatan
        Kirim catatan
        
    Tabel Validator / Petugas
        Validasi = Orderan baru. Admin -> Petugas -> Validator
        Re-open = Orderan revisi / terdapat nilai NOK (N). Validator -> Re-open Petugas -> Re-open Validator
