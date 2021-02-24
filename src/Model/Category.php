<?php

namespace Nails\Store\Model;

use Nails\Common\Model\Base;
use Nails\Common\Traits\Model\Nestable;
use Nails\Common\Traits\Model\Sortable;
use Nails\Config;

class Category extends Base
{
    use Nestable;
    use Sortable;

    // --------------------------------------------------------------------------

    const TABLE_NAME    = NAILS_DB_PREFIX . 'store_category';
    const AUTO_SET_SLUG = true;

    // --------------------------------------------------------------------------

    public function describeFields($sTable = null)
    {
        $aFields = parent::describeFields($sTable);

        $aFields['label']->validation[] = 'required';

        $aFields['parent_id']->label = 'Parent';
        $aFields['parent_id']->info  = 'Nesting categories to provide a hierarchy to the items in your store.';
        $aFields['parent_id']->class = 'js-store-searcher';
        $aFields['parent_id']->data  = ['api' => 'category'];

        $aFields['body']->label = 'Body';
        $aFields['body']->type  = 'cms_widgets';

        $aFields['seo_title']->label    = 'SEO Title';
        $aFields['seo_title']->fieldset = 'SEO';

        $aFields['seo_description']->label    = 'SEO Description';
        $aFields['seo_description']->fieldset = 'SEO';

        $aFields['seo_meta']->label    = 'SEO Meta';
        $aFields['seo_meta']->fieldset = 'SEO';

        $aFields['seo_script']->label    = 'SEO Script';
        $aFields['seo_script']->fieldset = 'SEO';

        return $aFields;
    }
}
