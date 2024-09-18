<style>
  .pagination {
  justify-content: center; /* Ortalar */
  font-size: 0.875rem;     /* Boyutu küçültür */
  }

  .pagination li {
      margin: 0 5px;           /* Butonlar arasındaki boşluk */
  }

  .pagination li a {
      padding: 6px 12px;       /* İç boşluk ayarlaması */
  }
</style>
<x-layout>
    <div class="container">
        <div class="card bordered bg-light">
            <div class="card-body">
                <table class="table table-striped table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Görev Adı</th>
                        <th scope="col">Görev Tanımı</th>
                        <th scope="col">Görev Tarihi</th>
                        <th scope="col">Durumu</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $number =1;
                        @endphp
                      @foreach ($todos as $todo )
                        <tr>
                            <th scope="row">{{$number++}}</th>
                            <td>{{$todo->title}} </td>
                            <td>{{$todo->description}}</td>
                            <td>{{\Carbon\Carbon::parse($todo->due_date)->format('d-m-Y')}}</td>
                            <td>
                                @if ($todo->isActive==true)
                                {{"Aktif"}}
                                @else
                                {{"Bitirildi"}}
                                @endif
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="d-flex justify-content-center">
              {{ $todos->links('pagination::bootstrap-4') }}
          </div>
        </div>
    </div>
</x-layout>