<?php

namespace RaditzFarhan\Innov8tifEkyc;

use Noodlehaus\AbstractConfig;

class Config extends AbstractConfig
{
    protected function getDefaults()
    {
        return [
            'okeydoc' => [
                'base_uri' => 'https://okaydocdemo.innov8tif.com/ekyc/api/ekyc',
                'ph' => [
                    'driving_license' => [
                        'latest_version' => 'v2',
                        'route' => '/doc-verify/ph-license',
                    ],
                    'sss' => [
                        'latest_version' => 'v2',
                        'route' => '/doc-verify/ph-sss',
                    ],
                    'umid' => [
                        'latest_version' => 'v2',
                        'route' => '/doc-verify/ph-umid',
                    ],
                    'voter_id' => [
                        'latest_version' => 'v1',
                        'route' => '/doc-verify/ph-voter',
                    ],
                    'postal_id' => [
                        'latest_version' => 'v2',
                        'route' => '/doc-verify/ph-postal',
                    ],
                    'prc_professional_id_card' => [
                        'latest_version' => 'v2',
                        'route' => '/doc-verify/ph-b1',
                    ],
                    'national_id' => [
                        'latest_version' => 'v2',
                        'route' => '/doc-verify/ph-national-id',
                    ]
                ]
            ],
            'okeyid' => [
                'base_uri' => 'https://okayiddemo.innov8tif.com/okayid/api',
                'ocr' => [
                    'latest_version' => 'v3',
                    'route' => '/ocr',
                ],
                'document_type' => [
                    'latest_version' => 'v1',
                    'route' => '/ocr/documenttype',
                ]
            ]
        ];
    }
}
