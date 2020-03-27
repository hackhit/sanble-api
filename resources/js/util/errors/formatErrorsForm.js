const formatErrorsForm = errors => {
    const keys = Object.keys(errors);
    let arrayErrors = [];

    for (let i = 0; i < keys.length; i++) {
        let stringErrors = "";
        errors[keys[i]].map(error => {
            stringErrors = stringErrors + " " + error;
        });
        arrayErrors.push(stringErrors);
    }

    return arrayErrors;
};

export default formatErrorsForm;
