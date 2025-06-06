<div>
    @if($showModal)
        <div class="modal-overlay">
            <div class="modal-content">
                <button wire:click="closeModal" class="modal-close">×</button>

                <h3>{{ $contact->last_name }} {{ $contact->first_name }}</h3>
                <p><strong>性別:</strong> {{ ['1' => '男性', '2' => '女性', '3' => 'その他'][$contact->gender] }}</p>
                <p><strong>メール:</strong> {{ $contact->email }}</p>
                <p><strong>内容:</strong> {{ $contact->detail }}</p>

                <form method="POST" action="/admin/{{ $contact->id }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button">削除</button>
                </form>
            </div>
        </div>
    @endif
</div>