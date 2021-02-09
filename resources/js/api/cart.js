import request from './request';

export function addToCart(data)
{
    return request({
        url: '/api/cart',
        method: 'post',
        data
    })
}

export function checkoutCart()
{
    return request({
        url: '/api/cart/checkout',
        method: 'post'
    })
}
