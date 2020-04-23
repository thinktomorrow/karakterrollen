<?php


/**
 * Retrieve the public asset with a version stamp.
 * This allows for browsercache out of the box
 */
if(!function_exists('cached_asset'))
{
    function cached_asset($filepath, $type = 'front')
    {
        $manifestPath = $type == 'back' ? '/assets/back' : '/assets/front';

        // Manifest expects each entry to start with a leading slash - we make sure to deduplicate the manifest path.
        $entry = str_replace($manifestPath,'', '/'.ltrim($filepath,'/') );

        try{
            $path = mix($entry, $manifestPath);

            /**
             * Paths should be given relative to the manifestpath so make sure to remove the basepath. When debug is
             * set to false mix() returns the entry path if the entry itself has not been found in the mix
             * manifest. When this path does not exist, we try to create the full path ourselves.
             */
            if( !file_exists(public_path(strip_query($path))) ){
                $path = $manifestPath.$entry;
            }

            return asset($path);
        }
        catch(\Exception $e)
        {
            app('bugsnag')->notifyException($e);

            return $manifestPath.$entry;
        }

    }
}

if(!function_exists('strip_query')){
    function strip_query($value)
    {
        if(false === strpos($value,'?')) return $value;

        return substr($value, 0, strpos($value,'?'));
    }
}

/**
 * Form fields for honeypot protection on form submissions
 * return HtmlString which does not force you to use blade escaping tags.
 */
if (!function_exists('honeypot_fields')) {
    function honeypot_fields()
    {
        return new \Illuminate\Support\HtmlString('<div style="display:none;"><input type="text" name="your_name"/><input type="hidden" name="_timer" value="'.time().'" /></div>');
    }
}
