//Exercice 1
let Tab = [2,6,10,3,8,7,20];
let result = 0;

for(let i=0;i<Tab.length; i++)
{
    if(Tab[i]%2 == 0)
                {
                    result+=Tab[i];
                        console.log(`Itération${Tab[i]} : ${result}`)
                }
                else
                {
                    console.log(`Itération${Tab[i]} : non paire`);
                }
}
console.log(`Le total est de : ${result}`)