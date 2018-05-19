function validasiMapel(){
    var kode_mapel = document.getElementById('kode');
    var mapel = document.getElementById('mapel');
    var alokasi_waktu = document.getElementById('alokasi_waktu');
    var semester = document.getElementById('semester');
    var kode_guru = document.getElementById('kode_guru');

    if(kode_mapel.value == ""){
        alert("Anda belum mengisi kode mapel");
        kode_mapel.focus();
        return false;
    }
  else if(mapel.value == ""){
    alert("Anda belum mengisi nama mapel");
    mapel.focus();
    return false;
  }
  else if(alokasi_waktu.value == ""){
    alert("Anda belum mengisi alokasi waktu");
    alokasi_waktu.focus();
    return false;
  }

  else if(semester.value == ""){
    alert("Anda belum mengisi semester");
    semester.focus();
    return false;
  }

  else if(kode_guru.value == "-"){
    alert("Anda belum memilih dosen");
    kode_guru.focus();
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