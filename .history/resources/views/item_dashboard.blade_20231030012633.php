@foreach ($placeDetails as $data)




@php
$placeDetail = $data->placeDetail;
$placename = ($placeDetail && $placeDetail->place) ? $placeDetail->place->name : '';
$placename.= ($placeDetail && $placeDetail->placeChild) ? ' → ' . $placeDetail->placeChild->name : '';
if(empty($placename)){
    $placename='No Place';
}

$total_observ=count($data->observationsDetail);
$hasBoth=true;

$icon = '<img src="' . asset('img/street.png') . '" class="h-10" alt=""/>';
$icon_bg='bg-site';
if ($data->placeDetail && $total_observ > 0) {
    $icon   = '<img src="' . asset('img/worried.png') . '" class="h-8" alt=""/>' . 
            '<img src="' . asset('img/street.png') . '" class="z-10 h-8 -ml-2 -mr-2" alt=""/>'.
             '<img src="' . asset('img/pleasant.png') . '" class="h-8" alt=""/>';
} else if ($data->placeDetail === null && $total_observ > 0) {
    $icon_bg='bg-[#ffa500]';
    $icon = '<img src="' . asset('img/worried.png') . '" class="h-8" alt=""/>' . 
             '<img src="' . asset('img/pleasant.png') . '" class="h-8" alt=""/>';
}


$observationString=NULL;

foreach ($data->observationsDetail as $observation) {
    $observationName = $observation->observation->name;
    $observationChildName = $observation->observationChild ? ' → ' . $observation->observationChild->name : '';
    $observationString .= $observationName . $observationChildName . ', ';
}
if(empty($observationString)){
    $observationString='No Observation';
}
$observationString = rtrim($observationString, ', ');


@endphp

                    <div class="flex p-2 mt-8 mb-2 items-center justify-between">
                        <a href="/placeDetail/{{$data->id}}" class="flex items-center">
                            <div class="h-20 w-20 rounded-full {{$icon_bg}} flex flex-row items-center justify-center text-center">
                                
                                {!! $icon !!}
                                
        
                            </div>
                            <h2 class="pl-2 italic text-base">{{$placename}} <br> {{$observationString}}</h2>

                        </a>
                        <div class="">

                            <a href="/edit/{{$data->id}}" class="parts bg-site">
                                Edit
                            </a>
                        </div>
                    </div>
                @endforeach
