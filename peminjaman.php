<form>
  <select class="form-select" id="bookSelect" aria-label="Default select example">
    <option selected disabled>Judul Buku</option>
    <option value="Arjuna & Kirana">Arjuna & Kirana</option>
    <option value="Anak-anak Kuala">Anak-anak Kuala</option>
    <option value="Anastasia Diary Teluk Alaska">Anastasia Diary Teluk Alaska</option>
    <option value="Bulan">Bulan</option>
    <option value="Bumi">Bumi</option>
    <option value="But I Still Love You">But I Still Love You</option>
    <option value="Cermin Jiwa">Cermin Jiwa</option>
    <option value="Chasing Shadows">Chasing Shadows</option>
    <option value="Cool Badboy">Cool Badboy</option>
    <option value="Dalam Sketsa">Dalam Sketsa</option>
    <option value="Don't Let Me Go">Don't Let Me Go</option>
    <option value="Dua Garis Biru">Dua Garis Biru</option>
    <option value="Everytime">Everytime</option>
    <option value="Epilog Rasa">Epilog Rasa</option>
    <option value="Exo For You">Exo For You</option>
    <option value="Falling In Love">Falling In Love</option>
    <option value="Fahrenheit 451">Fahrenheit 451</option>
    <option value="Flora">Flora</option>
    <option value="Game Over">Game Over</option>
    <option value="Goodbye">Goodbye</option>
    <option value="Gustira">Gustira</option>
    <option value="Hafalan Sholat Delisa">Hafalan Sholat Delisa</option>
    <option value="Hanya Sekedar Mimpi">Hanya Sekedar Mimpi</option>
    <option value="Hate List">Hate List</option>
    <option value="I'm Fine">I'm Fine</option>
    <option value="Inestable">Inestable</option>
    <option value="Ivanna Van Dijk">Ivanna Van Dijk</option>
    <option value="jangan Takut">jangan Takut</option>
    <option value="Kalandra">Kalandra</option>
    <option value="Kisah Tanah Jawa">Kisah Tanah Jawa</option>
  </select>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nama Peminjam</label>
    <input type="Name" class="form-control" id="exampleInputName">
  </div>
  <div class="mb-3">
    <label for="exampleInputDate" class="form-label">Tanggal Peminjaman</label>
    <input type="date" class="form-control" id="exampleInputDate">
  </div>
  <div id="liveAlertPlaceholder"></div>
  <button type="button" class="btn btn-primary" id="liveAlertBtn">Submit</button>
</form>
<script>
  const alertPlaceholder = document.getElementById('liveAlertPlaceholder');
  const appendAlert = (message, type) => {
    const wrapper = document.createElement('div');
    wrapper.innerHTML = [
      `<div class="alert alert-${type} alert-dismissible" role="alert">`,
      `   <div>${message}</div>`,
      '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
      '</div>'
    ].join('');
    alertPlaceholder.append(wrapper);
  };
  const alertTrigger = document.getElementById('liveAlertBtn');
  if (alertTrigger) {
    alertTrigger.addEventListener('click', () => {
      const bookSelect = document.getElementById('bookSelect');
      const selectedBook = bookSelect.options[bookSelect.selectedIndex].value;
      const selectedDate = document.getElementById('exampleInputDate').value;
      if (!selectedBook || selectedBook === "Judul Buku") {
        appendAlert('Silakan pilih judul buku!', 'danger');
        return;
      }
      
      if (!selectedDate) {
        appendAlert('Silakan isi tanggal peminjaman!', 'danger');
        return;
      }

      const data = { book: selectedBook, date: selectedDate };
      localStorage.setItem('data', JSON.stringify(data));
      
      appendAlert(
        `Anda telah meminjam buku <strong>${selectedBook}</strong> pada tanggal <strong>${selectedDate}</strong>.`,
        'success'
      );
    });
  }
</script>