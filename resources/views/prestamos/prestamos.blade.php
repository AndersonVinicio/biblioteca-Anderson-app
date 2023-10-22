
<x-app-layout>

    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table>

                    <tr>
                        <th>TITULO LIBRO</th>
                        <th>ISBN</th>
                        <th>Fecha inicio prestamo</th>
                        <th>Fecha final prestamo</th>
                        <th>Prestamo Finalizado</th>
                    </tr>
                    @foreach ($librosPrestados as $lisbroPrestado)
                    <tr>
                        <td>{{ $lisbroPrestado['titulo'] }}</td>
                        <td>{{ $lisbroPrestado['isbn']}}</td>
                
                        <td>{{ $lisbroPrestado['datosPrestamo']->fecha_prestamo}}</td>
                        <td>{{ $lisbroPrestado['datosPrestamo']->fecha_devolucion }}</td>
                        @if ($lisbroPrestado['datosPrestamo']->finalizado === 0)
                        <td>LIBRO PRESTADO</td>
                        @else
                        <td>PRESTAMO FINALIZADO</td>
                        @endif
                        @if ($lisbroPrestado['datosPrestamo']->finalizado === 0)
                        <td>
                            <a class="botonesTablaLibros" href="/finalizar-prestamo/{{ $lisbroPrestado['datosPrestamo']->id }}">FINALIZAR PRESTAMO</a>
                        </td>
                        @else
                        <td>
                            <a class="disabled-link" href="#">PRESTAMO FINALIZADO</a>
                        </td>
                        @endif
                
                    </tr>
                    @endforeach
                
                </table>
            </div>
        </div>
    </div>

</x-app-layout>