let filter_company_id = document.getElementById('filter_company_id')
if(filter_company_id){
    filter_company_id.addEventListener('change', function(){
        let companyId= this.valuen|| this.options[this.selectedIndex].value
        window.location.href = window.location.href.split('?')[0]+'?company_id='+companyId;
    });
}
document.querySelectorAll('.btn-delete').forEach((button)=>{
    button.addEventListener('click', function(event){
        event.preventDefault()
        if(confirm('Are you sure?')){
            let action = this.getAttribute('href');
            let form = document.getElementById('form-delete')
            form.setAttribute('action', action)
            form.submit()
        }
    })
})
document.getElementById('btn-clear').addEventListener('click', ()=>{
    let input = document.getElementById('search');
    let select = document.getElementById('company_id');
    input.value = "";
    window.location.href = window.location.href.split('?')[0]
});

const toggleRefresh=()=>{
    let query = location.search;
    let pattern = /[?&]search=/;
    let button = document.getElementById('btn-clear');
    if(pattern.test(query)){
        button.style.display = "block";
    }
    else{
        button.style.display = "none";
    }
}
toggleRefresh()

