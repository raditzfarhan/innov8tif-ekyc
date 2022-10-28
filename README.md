# Innova8tif eKYC

[![Latest Version on Packagist](https://img.shields.io/packagist/v/raditzfarhan/innov8tif-ekyc.svg?style=flat-square)](https://packagist.org/packages/raditzfarhan/innov8tif-ekyc)
[![Total Downloads](https://img.shields.io/packagist/dt/raditzfarhan/innov8tif-ekyc.svg?style=flat-square)](https://packagist.org/packages/raditzfarhan/innov8tif-ekyc)
![GitHub Actions](https://github.com/raditzfarhan/innov8tif-ekyc/actions/workflows/main.yml/badge.svg)

Simple SDK for Innov8tif eKYC API.

## Installation

You can install the package via composer:

```bash
composer require raditzfarhan/innov8tif-ekyc
```

## Available Methods
### OkeyDoc 

#### Philippines
- `drivingLicense(string $idImageBase64Image, ?mixed $caseNo)`
- `sss(string $idImageBase64Image, ?mixed $caseNo)`
- `umid(string $idImageBase64Image, ?mixed $caseNo)`
- `voterId(string $idImageBase64Image, ?mixed $caseNo)`
- `postalId(string $idImageBase64Image, ?mixed $caseNo)`
- `prcProfessionalIdCard(string $idImageBase64Image, ?mixed $caseNo)`
- `nationalId(string $idImageBase64Image)`

#### Parameters
| Name                     | Type         | Required   | Description  
|--------------------------|--------------|------------|-----------------
| idImageBase64Image       | string       | Yes        | Image in base64 corresponds to the method used
| caseNo                   | string\|null  | No         | Reference code given by user  

For more details, refer [here](https://api2-ekycapis.innov8tif.com/okaydoc/okaydoc-all/supported-documents/philippines).

### OkeyID
- `ocr(string $base64ImageString, $backImage, ?string $docTypeEnabled, ?string $faceImageEnabled, ?string $imageEnabled, ?string $imageFormat)`
- `documentType(string $base64ImageString, string $backImage, string $imageFormat, ?bool $imageEnabled)`

#### Parameters
| Name                     | Type           | Required                             | Description  
|--------------------------|----------------|--------------------------------------|-----------------
| base64ImageString        | string         | Yes                                  | Front id card/passport image in base64
| backImage                | string         | No on `ocr`, Yes on `documentType`   | Reference code given by user
| docTypeEnabled           | string         | No                                   | Set to `true` - Document type will be returned. Default to `true`.
| faceImageEnabled         | string         | No                                   | Set to `true` - Cropped face image will be returned. Default to `true`.
| imageEnabled             | string\|boolean | No                                   | Set to `true` - Cropped document image will be returned. Default to `true`.
| imageFormat              | string         | No on `ocr`, Yes on `documentType`   | Clarify the image format jpg, jpeg, png, bmp, gif, tiff, tif. Leave blank if unsure.

For more details, refer [here](https://api2-ekycapis.innov8tif.com/okayid/okayid-all/ocr-api).

## Usage

#### OkeyDoc

```php
use RaditzFarhan\Innov8tifEkyc\OkeyDoc\PH\Client;
use RaditzFarhan\Innov8tifEkyc\Exceptions\APIError;

...

$client = new Client($apiKey);

$caseNo = 'CASE 1234';
$idImageBase64Image = '/9j/4AAQSkZJ...fYs1wRtQHt//Z\r\n';

try {
    $response = $client->drivingLicense($idImageBase64Image, $caseNo);
    
    // success, do something with $response
} catch (APIError $e) {
    // Catch API Error
    // $e->getStatus()
    // $e->getMessage()
    // $e->getMessageCode()
    // $e->getMetaData()
    // $e->getResponseData() // raw response
    throw $e;
} catch (\Throwable $th) {
    throw $th;
}
```

#### OkeyID

```php
use RaditzFarhan\Innov8tifEkyc\OkeyID\Client;
use RaditzFarhan\Innov8tifEkyc\Exceptions\APIError;

...

$client = new Client($apiKey);

$base64ImageString = '/9j/4AAQSkZJ...fYs1wRtQHt//Z\r\n';

try {
    $response = $client->ocr($base64ImageString);
    
    // success, do something with $response
} catch (APIError $e) {
    // Catch API Error
    // $e->getStatus()
    // $e->getMessage()
    // $e->getResponseData() // raw response
    throw $e;
} catch (\Throwable $th) {
    throw $th;
}
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email raditzfarhan@gmail.com instead of using the issue tracker.

## Credits

-   [Farhan](https://github.com/raditzfarhan)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.