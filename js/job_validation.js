function validate() {
      if(document.job.company_name.value=='') {
            alert("Please enter company name");
            return false;
      }

      if(document.job.company_type.value=='') {
            alert("Please enter company type");
            return false;
      }

      if(document.job.industry.value=='') {
            alert("Please enter industry");
            return false;
      }

      if(document.job.job_title.value=='') {
            alert("Please enter job title");
            return false;
      }

      if(document.job.contract_type.value=='') {
            alert("Please enter contract type");
            return false;
      }

      if(document.job.city.value=='') {
            alert("Please enter city");
            return false;
      }      

      if(document.job.language.value=='') {
            alert("Please enter language skills");
            return false;
      }

      if(document.job.professional.value=='') {
            alert("Please enter professional skills");
            return false;
      }

      if(document.job.description.value=='') {
            alert("Please enter description");
            return false;
      }

      alert(confirm("Do you want to post the job?"));
}