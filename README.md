# Steuersatzrechner

[![codecov](https://codecov.io/gh/demvsystems/steuersatzrechner/branch/master/graph/badge.svg)](https://codecov.io/gh/demvsystems/steuersatzrechner)


Eine verinfachte Ermittlung des Steuersatzen auf Basis des Einkommens

## Beispiele
Für die aktuellsten Steuersätze
```php
$result = SteuersatzrechnerFactory::aktuell()->fuerEinkommen(32568);

echo $result->getEinkommen(); // 36589
echo $result->getSteuersatz(); // 23
echo $result->getSteuern(); // 8415.47
echo $result->getNettoeinkommen(); // 28173.53
echo $result->getSplitting(); // false
```

Für andere jahre, sofern vorhanden
```php
if(SteuersatzrechnerFactory::istVorhanden(2018)){
   $result = SteuersatzrechnerFactory::fuerJahr(2018)->fuerPaar(36589, 66987);
   echo $result->getEinkommen(); // 103576
   echo $result->getSteuersatz(); // 29
   echo $result->getSteuern(); // 30037.04
   echo $result->getNettoeinkommen(); // 73538.96
   echo $result->getSplitting(); // true
}
