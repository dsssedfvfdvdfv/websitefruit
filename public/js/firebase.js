const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
function uploadImage(){
    const ref = firebase.storage().ref();
    const file = document.querySelector('#img').files[0];
    const metadata = {
        contentType: file.type
    };

    const name = file.name;
    const uploadIMG = ref.child(name).put(file, metadata);
    uploadIMG
        .then(snapshot => snapshot.ref.getDownloadURL())
        .then(url => {
            console.log(url);
            Toast.fire({
                icon: 'success',
                title: 'Upload Thành Công',
            })
        }
        )
        .catch(Toast.fire({
            icon: 'warning',
            title: 'Đang Upload Ảnh',
        }));


}