<div> 
    @if ($showModal)
    <div>
        <div>
            <button wire:click="$emit('closeModal')">×</button>
    
            <div>
                <p>お名前：{{ $contact->last_name }} {{ $contact->first_name }}</p>
                <p>性別：{{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}</p>
                <p>メールアドレス：{{ $contact->email }}</p>
                <p>電話番号：{{ $contact->tel }}</p>
                <p>住所：{{ $contact->address }}</p>
                <p>建物名：{{ $contact->building }}</p>
                <p>お問い合わせの種類：{{ $contact->category->name ?? '未分類' }}</p>
                <p>お問い合わせの内容：{{ $contact->detail }}</p>
            </div>
    
            <div>
                <button wire:click="delete">削除</button>
            </div>
        </div>
    </div>
    @endif</div>