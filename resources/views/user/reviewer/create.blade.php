@extends ('user.layouts.app')

@section ('content')
  <div class="mb-2 px-4 py-2 text-start">
    <div class="mx-auto max-w-3xl mb-2 pb-2 p-4 bg-white border border-gray-200 rounded-lg shadow" >
      <h3 class="mb-0">公開プロフィール設定</h3>
      <x-hr />
      <div>
        <label class="w-full">
          <h5>公開名</h5>
          <div class="mb-2">
            <input type="text" name="name" value="{{ old('name'); }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
          </div>
        </label>
        <p class="text-sm">
          これによりアカウントに関連付けられている名前が変更されることはありません。<br />
          公開名は公開プロフィールページとAmazingの他の場所に表示されます。
        </p>
        <x-validation-error name='name' />
      </div>
      <x-hr />
      <div>
        <h5 class="mb-4">公開情報 (オプション)</h5>
        <div class="grid grid-cols-1 md:grid-cols-2 justify-items-center md:gap-4">
          <div class="w-full">
            <div class="mb-4">
              <h6>プロフィール</h6>
              <textarea rows="5" name="detail" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="公開したい情報を入力してください。">{{ old('detail', Auth::user()?->reviewer()->detail ?? '') }}</textarea>
            </div>
            <div class="mb-4">
              <h6>場所</h6>
              <input type="text" name="residence" value="{{ old('residence', Auth::user()?->reviewer()->residence ?? ''); }}" placeholder="居住地を入力してください。" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
          </div>
          <div class="w-full">
            <div class="mb-4">
              <h6>職業</h6>
              <input type="text" name="residence" value="{{ old('profession', Auth::user()?->reviewer()->profession ?? ''); }}" placeholder="職業を入力してください。" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-4">
              <h6>ウェブサイト</h6>
              <input type="text" name="residence" value="{{ old('website', Auth::user()?->reviewer()->website ?? ''); }}" placeholder="ウェブサイトを入力してください。" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
          </div>
        </div>
        <x-hr />
        <p class="text-sm">
          公開情報は公開プロフィールページに表示されます。<br />
          Amazing.co.jpでの閲覧・購入履歴は公開されません。 Amazingが、プロフィールページ経由で、アカウントログイン情報やパスワード、請求情報、または他のアカウントの詳細を尋ねることは決してありません。
        </p>
        <x-hr />
        
        <div class="pe-2 text-center">
          <button type="button" class="w-48 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm  text-center inline-flex justify-center items-center px-4 py-2.5 mr-2 mb-2">
            公開プロフィールに戻る
          </button>
          <button type="submit" class="w-48 text-gray-900 bg-[#F7BE38] hover:bg-[#F7BE38]/90 focus:ring-4 focus:outline-none focus:ring-[#F7BE38]/50 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex justify-center items-center mr-2 mb-2">
            保存する
          </button>
        </div>
      </div>

    </div>
  </div>
@endsection

@section('script')
@endsection