var screenWidth = window.innerWidth || document.documentElement.clientWidth;
var bengkelTable = document.getElementById('bengkel-table');

if (screenWidth <= 1024) {
    // Mengurangi jumlah kolom jika lebar layar <= 1024px
    var tableHeaders = bengkelTable.getElementsByTagName('th');
    for (var i = tableHeaders.length - 1; i >= 0; i--) {
        if (i !== 0 && i !== tableHeaders.length - 1) {
            bengkelTable.deleteCell(i);
        }
    }

    // Mengurangi jumlah kolom pada setiap baris data
    var tableRows = bengkelTable.getElementsByTagName('tr');
    for (var i = 0; i < tableRows.length; i++) {
        var cells = tableRows[i].getElementsByTagName('td');
        for (var j = cells.length - 1; j >= 0; j--) {
            if (j !== 0 && j !== cells.length - 1) {
                tableRows[i].deleteCell(j);
            }
        }
    }
}