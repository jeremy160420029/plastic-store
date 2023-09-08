<table class="table table-sm">
    <thead>
        <tr>
            <td>Nama Produk</td>
            <td>Foto Produk</td>
            <td>Harga</td>
            <td>Jumlah Pembelian</td>
            <td>Total Harga</td>
        </tr>
    </thead>

    <tbody>
        @foreach($transaction->products as $p)
        <tr>
            <td>{{$p->name}}</td>
            <td><img src="{{asset("/assets/img/products/".$p->img_url)}}" alt="" style="width:150px"/></td>
            <td>@currency($p->price)</td>
            <td>{{$p->pivot->quantity}}</td>
            <td>@currency($p->pivot->total_price)</td>
        </tr>

        @endforeach
        <tr>
            <td colspan="4">Total Sebelum Pajak</td>
            <td>@currency($transaction->total - $transaction->pajak)</td>
        </tr>
        <tr>
            <td colspan="4">Poin yang didapat</td>
            <td>{{$transaction->received_point}}</td>
        </tr>
        <tr>
            <td colspan="4">Pajak</td>
            <td>@currency($transaction->pajak)</td>
        </tr>
        <tr>
            <td colspan="4">Total Sesudah Pajak</td>
            <td>@currency($transaction->total)</td>
        </tr>
    </tbody>
</table>


