<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Transaction') }}
        </h2>
      </x-slot>
      
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white">
            <table class="table-auto w-full">
              <thead>
                <tr>
                  <td class="border px-6 py-4">ID</td>
                  <td class="border px-6 py-4">Food</td>
                  <td class="border px-6 py-4">User</td>
                  <td class="border px-6 py-4">Qty</td>
                  <td class="border px-6 py-4">Total</td>
                  <td class="border px-6 py-4">Status</td>
                  <td class="border px-6 py-4">Action</td>
                </tr>
              </thead>
              <tbody>
                @forelse ($transaction as $item)
                  <tr>
                    <td class="border px-6 py-4">{{ $item->id }}</td>
                    <td class="border px-6 py-4">{{ $item->food->name }}</td>
                    <td class="border px-6 py-4">{{ $item->user->name }}</td>
                    <td class="border px-6 py-4">{{ $item->qty }}</td>
                    <td class="border px-6 py-4">{{ number_format($item->total) }}</td>
                    <td class="border px-6 py-4">{{ $item->status }}</td>
                    <td class="border px-6 py-4 text-center">
                      <a href="{{ route('transaction.show',$item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">Show</a>
                      <form action="{{ route('transaction.destroy',$item->id) }}" method="post" class="inline-block">
                        @method('delete')
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded">Delete</button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="border text-center p-5">Transaction Not Found</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
          <div class="text-center mt-5">
            {{ $transaction->links() }}
          </div>
        </div>
    </div>
</x-app-layout>