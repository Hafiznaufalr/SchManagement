function validasiMapel(){
    var nama_guru = document.getElementById('nama_guru');
    var jumlah_jam = document.getElementById('jumlah_jam');
    var alamat = document.getElementById('alamat');
    var telp = document.getElementById('telp');
    var email = document.getElementById('email');

    if(nama_guru.value == ""){
        alert("Anda belum mengisi kNama Guru");
        nama_guru.focus();
        return false;
    }
  else if(jumlah_jam.value == ""){
    alert("Anda belum mengisi Jumlah Jam");
    jumlah_jam.focus();
    return false;
  }
  else if(alamat.value == ""){
    alert("Anda belum mengisi Alamat");
    alamat.focus();
    return false;
  }

  else if(telp.value == ""){
    alert("Anda belum mengisi Telepon");
    telp.focus();
    return false;
  }

  else if(email.value == ""){
    alert("Anda belum mengisi E-Mail");
    email.focus();
    return false;
  }
    else{
        return true;
    }

}

function validasiSearch(){
  var src = document.getElementById('src');

   if(src.value == ""){
    alert("Anda belum mengisi pencarian");
    src.focus();
    return false;
  }
    else{
        return true;
    }

}