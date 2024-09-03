// siswa.js
$(document).ready(function () {
    if (!$.fn.DataTable.isDataTable('#tbl_list')) {
        $('#tbl_list').DataTable({
            processing: true,
            serverSide: true,
            ajax: baseUrl,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'nama', name: 'Nama' },
                { data: 'nis', name: 'NIS' },
                { data: 'alamat', name: 'alamat' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    }


});
