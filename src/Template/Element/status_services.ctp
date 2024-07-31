<?php 

$css = [    
    0 => 'bg-success text-white',
    1 => 'bg-danger text-white',
    2 => 'bg-warning text-dark'
];

$msg = [
    'status_fichas' => [        
        0 => 'CONFERIDAS',
        1 => 'SEM CONFERÊNCIA',
        2 => 'AGUARDANDO RETORNO'
    ],
    'status_envelopes' => [        
        0 => 'CONFERIDOS',
        1 => 'SEM CONFERÊNCIA',
        2 => 'AGUARDANDO RETORNO'
    ]
];

echo "<span class='badge ".$css[$status]." m-0 p-1' style='border-radius: 0px'>".$msg[$tipo][$status]."</span>";

?>