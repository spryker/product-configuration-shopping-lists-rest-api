<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\ProductConfigurationShoppingListsRestApi\Processor\Mapper;

use Generated\Shared\Transfer\ProductConfigurationInstanceTransfer;
use Generated\Shared\Transfer\RestShoppingListItemProductConfigurationInstanceAttributesTransfer;
use Generated\Shared\Transfer\RestShoppingListItemsAttributesTransfer;
use Generated\Shared\Transfer\ShoppingListItemRequestTransfer;
use Generated\Shared\Transfer\ShoppingListItemTransfer;

class ProductConfigurationRestShoppingListItemsAttributesMapper implements ProductConfigurationRestShoppingListItemsAttributesMapperInterface
{
    /**
     * @var \Spryker\Glue\ProductConfigurationShoppingListsRestApi\Processor\Mapper\ProductConfigurationInstanceMapperInterface
     */
    protected ProductConfigurationInstanceMapperInterface $productConfigurationInstanceMapper;

    public function __construct(ProductConfigurationInstanceMapperInterface $productConfigurationInstanceMapper)
    {
        $this->productConfigurationInstanceMapper = $productConfigurationInstanceMapper;
    }

    public function mapRestShoppingListItemsAttributesTransferToShoppingListItemRequestTransfer(
        RestShoppingListItemsAttributesTransfer $restShoppingListItemsAttributesTransfer,
        ShoppingListItemRequestTransfer $shoppingListItemRequestTransfer
    ): ShoppingListItemRequestTransfer {
        $productConfigurationInstanceTransfer = $restShoppingListItemsAttributesTransfer->getProductConfigurationInstance();

        if (!$productConfigurationInstanceTransfer) {
            return $shoppingListItemRequestTransfer;
        }

        $productConfigurationInstanceTransfer = $this->productConfigurationInstanceMapper
            ->mapRestShoppingListItemProductConfigurationInstanceAttributesToProductConfigurationInstance(
                $productConfigurationInstanceTransfer,
                new ProductConfigurationInstanceTransfer(),
            );

        $shoppingListItemRequestTransfer
            ->getShoppingListItemOrFail()
            ->setProductConfigurationInstance($productConfigurationInstanceTransfer);

        return $shoppingListItemRequestTransfer;
    }

    public function mapShoppingListItemTransferToRestShoppingListItemsAttributesTransfer(
        ShoppingListItemTransfer $shoppingListItemTransfer,
        RestShoppingListItemsAttributesTransfer $restShoppingListItemsAttributesTransfer
    ): RestShoppingListItemsAttributesTransfer {
        $productConfigurationInstance = $shoppingListItemTransfer->getProductConfigurationInstance();

        if (!$productConfigurationInstance) {
            return $restShoppingListItemsAttributesTransfer;
        }

        $restShoppingListItemsAttributesProductConfigurationTransfer = $this->productConfigurationInstanceMapper
            ->mapProductConfigurationInstanceToRestShoppingListItemProductConfigurationInstanceAttributes(
                $productConfigurationInstance,
                new RestShoppingListItemProductConfigurationInstanceAttributesTransfer(),
            );

        return $restShoppingListItemsAttributesTransfer->setProductConfigurationInstance($restShoppingListItemsAttributesProductConfigurationTransfer);
    }
}
