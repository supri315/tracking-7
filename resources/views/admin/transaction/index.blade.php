@extends('admin.layout')
 
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
		<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Data Barang Masuk</h4>
        <div class="card">
			<div class="col-12 mb-5">
                    <div class="card-body">
                      <div class="demo-inline-spacing">
						<a href ="{{route('admin.barangmasuk.create')}}"
							type="button" 
							class="btn btn-primary" 
							style="float: right"> Tambah Data
						</a>
                      </div>
                    </div>
			</div>
			<table id="transaction" class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>No Resi</th>
					<th>Penerima</th>
					<th>Total Koli</th>
					<th>Total Berat</th>
					<th>Total Volume</th>
					<th>Tanggal Kirim</th>
					<th>Cabang Asal</th>
					<th>Status</th>
                    <th>Aksi</th>

				</tr>
        	</thead>
			<tbody>
			</tbody>
			</table>
	</div>
</div>

@endsection

@push('script')
<script>

$(function () {
	fetch_data();

    function fetch_data() {
        $("#transaction").DataTable({
            language: {
                searchPlaceholder: "Search...",
                sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
                sProcessing: "Sedang memproses...",
                sLengthMenu: "Tampilkan _MENU_ entri",
                sZeroRecords: "Tidak ditemukan data yang sesuai",
                sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                sInfoPostFix: "",
                sSearch: "",
                sUrl: "",
                oPaginate: {
                    sFirst: "Pertama",
                    sPrevious: "Sebelumnya",
                    sNext: "Selanjutnya",
                    sLast: "Terakhir",
                },
            },
            paging: true,
            processing: true,
            lengthChange: false,
            initComplete: function (settings, json) {
                $(".js-datatables").wrap(
                    "<div style='overflow:auto; width:100%;position:relative;'></div>"
                );
            },
            ajax: {
                url: "/dashboard/barang-masuk/data",
            },
            columns: [
                { data: "DT_RowIndex", name: "DT_RowIndex" },
                { data: "awb", name: "awb" },
                { data: "receiver", name: "receiver" },
                { data: "coli_total", name: "coli_total" },
                { data: "weight_total", name: "weight_total" },
                { data: "volume_total", name: "volume_total" },
                { data: "ship_date", name: "ship_date" },
                { data: "cabang", name: "cabang" },
                { data: "source_branch_id", name: "source_branch_id" },
                { data: "aksi", name: "aksi" },
            ],
        });

    }

   

    
});

</script>
@endpush