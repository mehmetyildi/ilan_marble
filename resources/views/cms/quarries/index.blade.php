@component('cms.components.content-listing') 

	@slot('pageUrl') 
		{{ $pageUrl }} 
	@endslot

	@slot('pageName') 
		{{ $pageName }} 
	@endslot

	@slot('pageItem') 
		{{ $pageItem }} 
	@endslot

	@slot('tHead')
		<th>Başlık</th>
		<th>Adres</th>
		<th>Yayınla</th>
		<th>İşlem</th>
		
	@endslot

	@slot('tBody') 
		@foreach($records as $record)
            <tr>
                
                <td>{{$record->title_tr}}</td>
                <td>{!!$record->address_tr!!}</td>
                <td class="actionsColumn">{{ ($record->publish) ? 'Evet' : 'Hayır' }}</td>
                @include('cms.includes.content-table-actions', ['record' => $record, 'pageUrl' => $pageUrl])
				
                
        @endforeach
	@endslot

@endcomponent