<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\ProductConfigurationShoppingListsRestApi\Processor\Mapper;

use Generated\Shared\Transfer\ProductConfigurationInstanceTransfer;
use Generated\Shared\Transfer\RestShoppingListItemProductConfigurationInstanceAttributesTransfer;

interface ProductConfigurationInstanceMapperInterface
{
    public function mapRestShoppingListItemProductConfigurationInstanceAttributesToProductConfigurationInstance(
        RestShoppingListItemProductConfigurationInstanceAttributesTransfer $restShoppingListItemProductConfigurationInstanceAttributesTransfer,
        ProductConfigurationInstanceTransfer $productConfigurationInstanceTransfer
    ): ProductConfigurationInstanceTransfer;

    public function mapProductConfigurationInstanceToRestShoppingListItemProductConfigurationInstanceAttributes(
        ProductConfigurationInstanceTransfer $productConfigurationInstanceTransfer,
        RestShoppingListItemProductConfigurationInstanceAttributesTransfer $restShoppingListItemProductConfigurationInstanceAttributesTransfer
    ): RestShoppingListItemProductConfigurationInstanceAttributesTransfer;
}
