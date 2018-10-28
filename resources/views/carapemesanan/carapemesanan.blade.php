@extends('layouts.app')
@section('content')
<div class="col-md-3">
        @include('catalogs._search-panel', [
          'q' => isset($q) ? $q : null,
          'cat' => isset($cat) ? $cat : ''
        ])
    
        @include('catalogs._category-panel')
    
        @if (isset($category) && $category->hasChild())
          @include('catalogs._sub-category-panel', ['current_category' => $category])
        @endif
    
        @if (isset($category) && $category->hasParent())
          @include('catalogs._sub-category-panel', [
            'current_category' => $category->parent
          ])
        @endif
    
      </div>
      <div class="container">
            <div class="col-md-6">
                <div class="blog-post-area">
                    <h2 class="title text-center">Pemesanan Furniture Semarang Secara Offline</h2>
                    <div class="single-blog-post">
                        <div class="thumbnail col-xs-12">
                            <div class="col-md-12">
                                   <p> 1. Anda bisa datang langsung ke alamat kami
                                    2. Anda dapat memilih dan membeli langsung produck yang tersedia di toko kami, Atau anda juga dapat melalukan pemesanan produck yang sesuai dengan keinginan anda.
                                    Anda Juga di persilahkan untuk mengecek langsung proses produksi.
                                    Untuk proses pengiriman barang bisa di serahkan kepada kami atau anda dapat mengambil sendiri di alamat kami.</p>
                                </div>
                            </div>
                        </div>
                    <h2 class="title text-center">Pemesanan Furniture Semarang Secara Offline</h2>
                    <div class="single-blog-post">
                        <div class="thumbnail col-xs-12">
                            <div class="col-md-12">
                                   <p>Kirimkan via email/bbm/whatsapp/wechat mengenai informasi detail barang yang akan anda pesan ke kami anda dapat menghubungi kami melalu form di halaman kontak pada website kami ini.
                                        Kami akan menghubungi anda kembali setelah menerima kontak dari anda dan kami akan memberikan segala informasi detail furniture / mebel PERABOTAN yang akan anda pesan.
                                        Kami akan mengirimkan list item furniture / mebel PERABOTAN yang akan anda pesan ke email/whatsapp atau bbm anda dan disertakan ukuran dan spesifikasi detail per barang sesuai dengan keinginan anda ( termasuk harga )
                                        NEGOSIASI HARGA
                                        Negosiasi dilakukan pada saat kami telah mengirimkan OFFERING harga dan specifikasi detail produk yang akan anda pesan. negosiasi dapat dilakukan melalui media Email , Telephone , ataupun SMS dan BBM atau WhatsApp
                                        Setelah terjadi kesepakatan harga antara kedua belah pihak maka kami akan mengirimkan order anda yang akan di kirimkan langsung ke Email atau BBM dan WhatsApp anda. ( berisi total keselurahan tagihan order anda )Jasa Pembuatan Web
                                        PEMBAYARAN
                                        Setelah anda mendapatkan total harga yang kami berikan anda dapat melakukan pembayaran order.
                                        anda dapat men transfer biaya / tagihan anda ke no. rekening yang kami berikan.
                                        pembayaran di lakukan 2 tahap , 50 % (DEPOSIT ) setelah terjadi kesepakatan dan 50% ( PELUNASAN ) harus dibayarkan pada saat furniture / mebel pesanan anda siap untuk di kirim ke alamat anda.
                                        Setelah melakukan transfer di mohon untuk melakukan konfirmasi via email atau bbm ke kami dan disertakan lampiran bukti bahwa anda sudah melakukan transfer ( Slip ATM / Copy Transfer / lainnya )
                                        PROSES PEMBUATAN ORDER ANDA
                                        Setelah anda melakukan konfirmasi pembayaran deposit untuk pembelian anda , kami akan melakukan pengecekan rekening.
                                        Setelah kami menyatakan uang anda sudah berada pada rekening kami maka order akan di proses.
                                       
                                        PENGIRIMAN MEBEL PERABOTAN PESANAN ANDA
                                        Setelah proses pengerjaan order anda selesai dan sebelum kami mengirim pesanan anda via kurir, kami akan kembali menghubungi anda untuk mengkonfirmasi bahwa order anda sudah selesai dan sekaligus akan mengirimkan tagihan pelunasan order / pesanan anda.
                                        Setelah anda melakukan pembayaran pelunasan tagihan pesanan anda dan mengkonfirmasinya kepada kami seperti halnya pada saat melakukan pembayaran deposit maka kami akan mengirim mebel / furniture pesanan anda ke alamat yang anda inginkan.
                                        kami akan mengirimkan nota / kuwitansi ongkos pengiriman ke email/whatsapp atau bbm anda ( hal ini dimaksudkan sebagai bukti bahwasanya kami sudah benar-benar melakukan pengiriman mebel pesanan anda )
                                        Untuk pengiriman di luar JABODETABEK biaya pengiriman di tanggung pihak pembeli
                                        Untuk pengiriman ke wilaya JABODETABEK biaya pengiriman ditanggung pihak kami
                                        Furniture / Mebel PERABOTAN pesanan anda akan dikirimkan melalui jasa kurir yang tersedia di kota kami Semarang ( silahkan menghubungi customer service kami untuk memperoleh informasi detail tentang hal tersebut )</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
      </div><!--/blog-post-area-->

@endsection