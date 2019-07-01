# AcmeCompany
## Intro
I have defined the of following objects to represent the model needed to achieve the objectives for the proof of concept for Acme Company. 
The solution features two main section
- Product Catalogue 
- Basket


## Assumptions
- Only one Delivery offer can be applied to each order (basket)
- Only one special offer can be applied to each order (basket)

# Implementation
## Product Catalogue
The product catalogue instantiated a list of product as detailed in the worksheet.  (eg Red Widge, Green Widget and Blue Widget).  At this point a quantity and product choices can be made and submitted to the basket to obtain the total.

## Basket
The basket is responsible for applying the offers and adjusting the overal total.  At this stage when products are added to the basket the unaltered total is calculated.
I have used the Rules object to apply triggers and actions based on totals.  These rules are executed where the total for the order is request.

### Rules
Three main rules were created;
- Order less than $50 = 4.95
- Orderes less than $90 but greater than $50 = 2.95
- Order over $90 = Free Delivery (0)

## Objects
- Product
- OrderedProduct (extends Product)
- Rule
- OfferRule (extends Rule)
- Basket

