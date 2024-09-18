<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-body bordered bg-light">
                <form method="POST" action="{{route('todo.update',$todo->id)}}">
                    @csrf
                    <div class="form-group">
                        <label for="task-title">Görev Başlığı</label>
                        <input type="text" class="form-control" value="{{$todo->title}}" name="title" id="todo-title" placeholder="Görev başlığını girin">
                    </div>
                    <div class="form-group">
                        <label for="task-description">Açıklama</label>
                        <textarea class="form-control" id="todo-description"   name="description" rows="3" placeholder="Görev açıklamasını girin">{{$todo->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="task-date">Tarih</label>
                        <input type="date" name="date" class="form-control" value="{{ $todo->due_date ? \Carbon\Carbon::parse($todo->due_date)->format('Y-m-d') : '' }}" name="date" id="task-date">
                    </div>

                    
                    <div class="form-group form-check">
                        @if($todo->isActive==true)
                        <input type="checkbox" id="todo-active" name="isActive" checked class="form-check-input">
                        @else
                        <input type="checkbox" id="todo-active" name="isActive"  class="form-check-input">
                        @endif
                        
                        <label class="form-check-label">Aktiflik Durumu</label>
                    </div>
                    <div class="modal-footer">
                        <a href="{{route('todolist')}}" class="btn btn-secondary">Geri</a>
                        <button type="submit" class="btn btn-primary">Görevi Kaydet</button>
                    </div>
                </div>
        
                </form>
            </div>
        </div>
 <!-- Modal içeriği buraya gelecek -->
        
    </div>
       
</x-layout>