@foreach($data2 as $item) 
[<br>
			'name'=>'{{$item->name}}',<br>
			'name2'=>'{{$item2->name}}',<br>
			'description'=>'{{$item2->description}}',<br>
			'id_type'=>'{{$item2->id_type}}',<br>
			'unit_price'=>'{{$item2->unit_price}}',<br>
			'promotion_price'=>'{{$item2->promotion_price}}',<br>
			'image'=>'{{$item2->image}}',<br>
			'unit'=>'{{$item2->unit}}',<br>
			'new'=>'{{$item2->new}}' ,<br>
			],<br>