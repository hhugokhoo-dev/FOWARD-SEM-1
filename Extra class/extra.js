const numbers = [3, 8, 15, 42, 7]

function printEvenOrOdd(arr){
    for (let i = 0; i < arr.length; i++){
        const num = arr[i]
        if (num % 2 === 0){
            console.log(`${num} is even`)
        } else{
            console.log(`${num} is odd`)
        }
    }
}

printEvenOrOdd(numbers)