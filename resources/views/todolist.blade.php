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
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row" style="height: 10%;">
            <div class="col text-end btnNewTask">
                <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">
                    Yeni Görev Ekle
               </a>
            </div>
           
        </div>
        <div class="row">
            @if($todos->isEmpty())
                <h1>Henüz Görev Oluşturmadınız</h1>
            @else
            @foreach ($todos as $todo)
            <div class="card m-2" style="width: 18rem; height: 90%">
                <div class="card-body">
                  <h5 class="card-title">{{$todo->title}}</h5>
                  <h6 class="card-subtitle mb-2 text-muted">{{$todo->isAcvite}}</h6>
                  <p class="card-text">{{\Carbon\Carbon::parse($todo->due_date)->format('d-m-Y')}}</p>
                  <a href="{{route('tododetail',['id' => $todo->id])}}" 
                  class="card-link">Görev Detayı</a>
                  <a href="#"  class="card-link" onclick="confirmDelete()">Görevi Sil</a>
                </div>
            </div>

            @endforeach
            <hr>

            <div class="d-flex justify-content-center">
                {{ $todos->links('pagination::bootstrap-4') }}
            </div>
            
            <form id="deleteForm" method="POST" action="{{route('todo.delete',$todo->id)}}" style="display: none">
                @csrf
                @method('DELETE')
            </form>
                
             
            @endif
            
        </div>
        
    </div>
    
</x-layout>



<!-- Modal -->
<!-- Yeni Task Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yeni Görev Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Modal içeriği buraya gelecek -->
                <form method="POST" action="{{route('todos.create')}}">
                    @csrf
                    <div class="form-group">
                        <label for="task-title">Görev Başlığı</label>
                        <input type="text" class="form-control" name="title" placeholder="Görev başlığını girin">
                    </div>
                    <div class="form-group">
                        <label for="task-description">Açıklama</label>
                        <textarea class="form-control" id="task-description" name="description" rows="3" placeholder="Görev açıklamasını girin"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="task-date">Tarih</label>
                        <input type="date" name="date" class="form-control" name="date" id="task-date">
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-primary">Görevi Ekle</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        if (confirm("Bu görevi silmek istediğinizden emin misiniz?")) {
            // Eğer onaylarsa formu gönder
            document.getElementById('deleteForm').submit();
        } else {
            // Onaylamazsa hiçbir şey yapma
            return false;
        }
    }

    $(function() {
        $("#task-date").datepicker({
            dateFormat: "dd-mm-yy"  // Tarih formatı
        });
    });
</script>
