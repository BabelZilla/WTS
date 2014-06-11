<?php
use Illuminate\Database\Capsule\Manager as Capsule;

class TranslatedStringObserver
{

    public function saving($model)
    {

    }

    public function saved($model)
    {

    }

    public function creating($model)
    {
        //echo "Creating...<br>";
    }

    public function created($model)
    {

    }

    public function updating($model)
    {
        $oldData = TranslatedStrings::find($model->id);
        $data = $oldData->toArray();
        unset($data['version']);
        TranslatedStringsVersion::unguard();
        $versioning = TranslatedStringsVersion::create($data);
        TranslatedStringsVersion::reguard();
        $model->version = $versioning->version;
        return true;
    }

    public function updated($model)
    {

    }

    public function deleting($model)
    {

    }

    public function deleted($model)
    {

    }
}