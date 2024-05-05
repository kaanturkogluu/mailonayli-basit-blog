

function kullaniciOnayi(islem) {
    return new Promise((resolve) => {
        Swal.fire({
            title: islem + 'Emin misiniz?',
            text: "Bu işlemi geri alamayacaksınız!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Evet!',
            cancelButtonText: 'İptal',
        }).then((result) => {
            if (result.isConfirmed) {
                resolve(true);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                resolve(false);
            }
        });
    });
}
/*   kullaniciOnayi('Silme İslemi').then((onay) => {
                if (onay) { */

                

function hataliMesaji(islem) {
    Swal.fire({
        icon: 'error',
        title: 'Hata',
        text: islem + "Gerçekleştirilemedi",
        confirmButtonColor: '#d33'
    });
}

function basariliMesaji(islem) {
    Swal.fire({
        icon: 'success',
        title: 'Basarili',
        text: islem + "Basarili Sekilde Gerçekleşti",
        confirmButtonColor: '#d33',
        confirmButtonText:'Tamam'
    });
}

function iptalMesaji(islem) {
    Swal.fire({
        icon: 'info',
        title: islem + ' İptal Edilidi',
        confirmButtonColor: '#d33',
        confirmButtonText:'Tamam'
    });
}

function beklet() {
    Swal.fire({
        title: 'Yükleniyor',
        html: '<i class="fas fa-spinner fa-spin"></i>',
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false
    });
}

function bilgiMesaji(mesaj){
    Swal.fire({
        icon: 'info',
        title: mesaj ,
        confirmButtonColor: '#d33',
        confirmButtonText:'Tamam'
    });
}
function kapat(){
    Swal.close();
}
function basariliYonlendirme(url){
    Swal.fire({
        title: 'Başarılı',
        text: 'İşlem başarıyla tamamlandı. Yönlendiriliyorsunuz...',
        icon: 'success',
        showConfirmButton: false,
        timer: 1500
    }).then((result) => {

        window.location.href =url; // Change to your desired destination URL
        // 3000 milliseconds = 3 seconds// Change 'redirect_page.html' to your desired destination URL
    });
}

function sureliBasariliMesajiGoster(time,islem){
    Swal.fire({
        icon: 'success',
        title: 'Başarılı',
        text:  islem + ' İşlemi Tamamlandı',
        timer: time,
        showConfirmButton: false
    });

}function sureliBasarisizMesajiGoster(title,text,time){
    Swal.fire({
        icon: 'error',
        title: title,
        text:  text ,
        timer: time,
        showConfirmButton: false
    });
}
function sagUstKoseBasariliMesaji(){
    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Kayıt Edildi",
        showConfirmButton: false,
        timer: 3000
    });
}