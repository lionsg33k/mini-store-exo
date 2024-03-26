<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mini store</title>


</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">

    <h1>Clients </h1>
    <form action="{{ route('client.store') }}" method="post">
        @csrf
        <input name="name" type="text" placeholder="Insert user s name">

        <button type="submit">Insert</button>
    </form>
    <h4>My clients are :</h4>
    @foreach ($clients as $client)
        <h2>{{ $client->name }}</h2>
    @endforeach


    <hr>
    <hr>
    <hr>
    <h1>Categories </h1>

    <form action="{{ route('type.store') }}" method="post">
        @csrf
        <input name="name" type="text" placeholder="Insert category's type">

        <button type="submit">Insert</button>
    </form>

    <h4>My Categories include :</h4>
    @foreach ($types as $type)
        <h2>{{ $type->name }}</h2>
    @endforeach

    <hr>
    <hr>
    <hr>

    <h1>Products</h1>


    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <input name="name" type="text" placeholder="Insert product's name">
        <br> <br><br>
        @foreach ($types as $type)
            <label for="">{{ $type->name }}</label>
            <input value="{{ $type->id }}" type="checkbox" name="types[]">
        @endforeach
        <br>
        <br><br>
        <button type="submit">Insert</button>
    </form>

    <hr>
    <hr>
    <hr>

    <h1>Client will buy product here </h1>

    <form action="{{ route('carts.store') }}" method="post">
        @csrf
        <label for="">Select client li ghaychri</label>
        <br><br>


        <select name="client">
            <option value="" selected disabled>Select Bnadm here</option>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>


        <br> <br><br>
        @foreach ($products as $product)
            <label for="">{{ $product->name }}</label>
            <input value="{{ $product->id }}" type="checkbox" name="products[]">
        @endforeach
        <br>
        <br><br>
        <button type="submit">Insert</button>
    </form>


    @forelse ($clients as $client)

        <h1>Client {{ $client->name }} bought </h1>

        <ol>
            @    ($client->products as $product)
                <li>{{ $product->name }} that is belong to </li>
                <ul>
                    @foreach ($product->types as $type)
                        <li>{{ $type->name }} </li>
                    @endforeach
                </ul>
            @endforeach
        </ol>

    @empty
        <h1>Empty cart</h1>
    @endforelse


</body>

</html>
