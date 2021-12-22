@foreach($data as $index => $items)
                            <tr>
                                <td>
                                    <a href="{{ route('products.edit', $item) }}">{{ $items->name }}</a>
                                </td>
                                <td>{{ $items->price }}</td>
                                <td>{{ $items->currency }}</td>
                               <td style="width: 100px;">
                                    <div class="small text-muted">
                                        {{ $items->description }}
                                    </div>
                                </td>
                               <td>
                                <div class="small text-muted">
                                    Date Created: {{ $items->created_at->format('M j, Y') }}
                                </div>
                                <div class="small text-muted">
                                    Date Modified: {{ $items->updated_at->format('M j, Y') }}
                                </div>
                                </td>
                                
                                <td>
                                     <div class="d-flex">
                                        <div class="p-1 ">
                                             <a href="" class="btn btn-sm btn-primary">Edit</a>
                                        </div>
                                        <div class="p-1 ">
                                                <form method="post" action="">
                                                    <button type="submit" class="btn btn-sm btn-danger btn-clean">
                                                       Delete
                                                    </button>
                                                </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach