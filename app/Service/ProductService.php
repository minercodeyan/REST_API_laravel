<?php

namespace App\Service;

use App\Constant\ValidationConstant;
use App\Exceptions\NotFoundException;
use App\Models\Product;
use App\Utils\ProjectValidator;
use Illuminate\Validation\ValidationException;

class ProductService
{
    protected ProjectValidator $projectValidator;

    public function __construct(ProjectValidator $projectValidator)
    {
        $this->projectValidator = $projectValidator;
    }

    public function findAll(){
        return Product::all();
    }

    /**
     * @throws ValidationException
     */
    public function createProduct($prod){
        $this
            ->projectValidator
            ->validateRequest($prod,ValidationConstant::getProductValidationForSave());
        return Product::create($prod);
    }

    public function findProductById($id){
        return Product::findOr($id,function (){
            throw new NotFoundException("product");
        });
    }

    /**
     * @throws ValidationException
     */
    public function updateProduct($input, $prod) : void{
        $this
            ->projectValidator
            ->validateRequest($input,ValidationConstant::getProductValidationForUpdate());
        $prod->firstname = $input['name'];
        $prod->lastname = $input['barcode'];
        $prod->save();;
    }

    public function deleteProduct($id) : bool
    {
        return Product::findOr($id,function (){
            throw new NotFoundException("Product already deleted and");
        })->delete();
    }

}
