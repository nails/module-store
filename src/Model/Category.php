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

        $aFields['label']
            ->setIsRequired(true);

        $aFields['parent_id']
            ->setLabel('Parent')
            ->setInfo('Nesting categories to provide a hierarchy to the items in your store.')
            ->setClass('js-store-searcher')
            ->setData(['api' => 'category']);

        $aFields['body']
            ->setLabel('Body')
            ->setType('cms_widgets');

        $aFields['seo_title']
            ->setLabel('SEO Title')
            ->setFieldset('SEO');

        $aFields['seo_description']
            ->setLabel('SEO Description')
            ->setFieldset('SEO');

        $aFields['seo_meta']
            ->setLabel('SEO Meta')
            ->setFieldset('SEO');

        $aFields['seo_script']
            ->setLabel('SEO Script')
            ->setFieldset('SEO');

        return $aFields;
    }
}
