const skillInput = document.getElementById("skillInput");
const specialInput = document.getElementById("specialInput");
const hiddenSpecialInput = document.getElementById("hiddenSpecialInput");
const hiddenSkillInput = document.getElementById("hiddenSkillInput");
const hiddenResponsibilityInput = document.getElementById(
    "hiddenResponsibilityInput"
);
const hiddenRequirementInput = document.getElementById(
    "hiddenRequirementInput"
);

const skillTags = document.querySelector(".skill-tags");
const specialTags = document.querySelector(".special-tags");

const suggestionsSpecialList = document.getElementById(
    "suggestionsList-special"
);
const suggestionsSkillList = document.getElementById("suggestionsList-skill");

const formSkills = document.getElementById("form-skills");
const formSpecials = document.getElementById("form-specials");

const responsibilityInput = document.getElementById("responsibilityInput");
const requirementInput = document.getElementById("requirementInput");

const responsibilityTags = document.querySelector(".responsibility-tags");
const requirementTags = document.querySelector(".requirement-tags");

const formResponsibility = document.getElementById("form-responsibility");

const suggestionsResponsibilityList = document.getElementById(
    "suggestionsList-responsibility"
);
const suggestionsRequirementList = document.getElementById(
    "suggestionsList-requirement"
);

// Define some default suggestions for skills
const suggestionsSkills = [
    // Technology
    "JavaScript",
    "Python",
    "Java",
    "C++",
    "Ruby",
    "PHP",
    "SQL",
    "HTML/CSS",
    "React",
    "Angular",
    "Node.js",
    "Vue.js",
    "Swift",
    "C#",
    "Go",
    "TypeScript",
    "Machine Learning",
    "Cloud Computing",
    "DevOps",
    "Kubernetes",
    "Docker",
    "Blockchain",
    "Data Analysis",
    "Big Data",
    "Artificial Intelligence",
    "Cybersecurity",

    // Marketing
    "Digital Marketing",
    "SEO",
    "SEM",
    "Social Media Marketing",
    "Content Marketing",
    "Email Marketing",
    "Google Analytics",
    "Brand Strategy",
    "PPC Advertising",
    "Affiliate Marketing",
    "Influencer Marketing",
    "Market Research",
    "Product Marketing",
    "Campaign Management",
    "Event Planning",
    "Public Relations",
    "CRM Software",

    // Sales
    "Sales Strategy",
    "Customer Relationship Management",
    "B2B Sales",
    "B2C Sales",
    "Lead Generation",
    "Cold Calling",
    "Negotiation",
    "Closing Deals",
    "Account Management",
    "Sales Forecasting",
    "Sales Presentations",
    "Sales Automation",
    "Sales Analytics",
    "Customer Acquisition",
    "Retail Sales",
    "Sales Training",

    // Finance
    "Financial Analysis",
    "Budgeting",
    "Accounting",
    "Investment Strategy",
    "Risk Management",
    "Corporate Finance",
    "Financial Modeling",
    "Tax Planning",
    "Bookkeeping",
    "Cash Flow Management",
    "Audit",
    "Mergers & Acquisitions",
    "Financial Reporting",
    "Insurance",
    "Banking Operations",
    "Financial Forecasting",

    // Human Resources
    "Recruitment",
    "Employee Relations",
    "Performance Management",
    "Onboarding",
    "Training and Development",
    "Compensation & Benefits",
    "HR Policies",
    "Conflict Resolution",
    "HRIS Systems",
    "Labor Laws",
    "Workplace Diversity",
    "Employee Engagement",
    "Succession Planning",
    "Talent Acquisition",
    "Payroll Management",

    // Customer Service
    "Customer Support",
    "Conflict Resolution",
    "Problem Solving",
    "Communication",
    "Empathy",
    "CRM Software",
    "Active Listening",
    "Customer Retention",
    "Teamwork",
    "Complaint Management",
    "Product Knowledge",
    "Call Center Operations",
    "Time Management",
    "Technical Support",
    "Sales Support",
    "Multitasking",

    // Design
    "Graphic Design",
    "UI/UX Design",
    "Branding",
    "Web Design",
    "Adobe Photoshop",
    "Adobe Illustrator",
    "Sketch",
    "Figma",
    "Wireframing",
    "Prototyping",
    "Responsive Design",
    "Typography",
    "Color Theory",
    "Print Design",
    "Creative Direction",
    "Animation",

    // Engineering
    "Mechanical Engineering",
    "Electrical Engineering",
    "Civil Engineering",
    "Software Engineering",
    "Robotics",
    "3D Modeling",
    "CAD",
    "Finite Element Analysis",
    "Quality Assurance",
    "Testing",
    "Systems Engineering",
    "Project Management",
    "Automation",
    "Construction Engineering",
    "Materials Science",
    "Structural Analysis",

    // Health Care
    "Patient Care",
    "Medical Coding",
    "Pharmacy",
    "Nursing",
    "Clinical Research",
    "Emergency Response",
    "Medical Terminology",
    "Anatomy",
    "Pharmacology",
    "Healthcare Administration",
    "Patient Monitoring",
    "Healthcare IT",
    "Health Informatics",
    "Diagnostic Imaging",
    "Mental Health Care",
    "Therapeutic Techniques",

    // Education
    "Curriculum Development",
    "Teaching",
    "Classroom Management",
    "E-learning",
    "Instructional Design",
    "Lesson Planning",
    "Special Education",
    "Educational Technology",
    "Student Assessment",
    "Parent Communication",
    "Online Tutoring",
    "English Language Teaching",
    "Language Arts",
    "Mathematics Instruction",
    "STEM Education",
    "Pedagogy",

    // Legal
    "Contract Law",
    "Corporate Law",
    "Criminal Law",
    "Legal Research",
    "Litigation",
    "Dispute Resolution",
    "Intellectual Property",
    "Family Law",
    "Legal Writing",
    "Real Estate Law",
    "Employment Law",
    "Compliance",
    "Legal Drafting",
    "Negotiation",
    "Mediation",
    "Regulatory Affairs",

    // Hospitality
    "Customer Service",
    "Event Planning",
    "Hotel Management",
    "Tourism",
    "Food and Beverage",
    "Hospitality Operations",
    "Guest Services",
    "Reservation Systems",
    "Staff Management",
    "Housekeeping",
    "Event Coordination",
    "Public Relations",
    "Budgeting",
    "Marketing",
    "Sales",
    "Team Leadership",

    // Supply Chain and Logistics
    "Inventory Management",
    "Logistics",
    "Supply Chain Management",
    "Procurement",
    "Shipping",
    "Transportation",
    "Warehousing",
    "Forecasting",
    "Vendor Management",
    "Import/Export",
    "Freight Forwarding",
    "Order Fulfillment",
    "Risk Management",
    "Supply Chain Optimization",
    "Quality Control",
    "Logistics Analytics",

    // Retail
    "Customer Service",
    "Sales",
    "Visual Merchandising",
    "Product Knowledge",
    "Inventory Management",
    "Point of Sale (POS)",
    "Cash Handling",
    "Sales Forecasting",
    "Retail Management",
    "Store Operations",
    "Team Leadership",
    "Brand Promotion",
    "Customer Retention",
    "Retail Marketing",
    "Product Display",

    // Construction
    "Project Management",
    "Construction Management",
    "Blueprint Reading",
    "Site Supervision",
    "Construction Estimating",
    "Contract Negotiation",
    "Building Codes",
    "Safety Regulations",
    "Structural Engineering",
    "Heavy Machinery Operation",
    "Cost Estimation",
    "Construction Software",
    "Renovation",
    "Concrete Construction",
    "Carpentry",
    "Electricity and Plumbing",

    // Art and Entertainment
    "Photography",
    "Video Production",
    "Graphic Design",
    "Animation",
    "Music Production",
    "Theater Arts",
    "Painting",
    "Creative Writing",
    "Film Editing",
    "Fashion Design",
    "3D Modeling",
    "Event Planning",
    "Sound Engineering",
    "Stage Management",
    "Art Direction",
    "Public Speaking",

    // Real Estate
    "Property Management",
    "Real Estate Marketing",
    "Residential Sales",
    "Commercial Sales",
    "Real Estate Valuation",
    "Investment Analysis",
    "Negotiation",
    "Real Estate Law",
    "Property Development",
    "Lease Agreements",
    "Client Relations",
    "Market Analysis",
    "Tenant Management",
    "Mortgage Brokerage",
    "Real Estate Appraisal",
];
const suggestionsSpecials = [
    "Flexible Work Hours",
    "Competitive Salary",
    "Career Growth Opportunities",
    "Innovative Work Environment",
    "Remote Work Options ",
    "Health and Wellness Benefits",
    "Paid Time Off",
    "Inclusive Company Culture",
    "Exciting Projects",
    "Collaborative Team",
    "Performance-Based Bonuses",
    "Learning and Development",
    "Employee Recognition",
    "State-of-the-Art Tools",
    "Social Impact",
];
const suggestionsResponsibility = [];
const suggestionsRequirement = [];

let selectedSkills = [];
let selectedSpecials = [];
let selectedResponsibility = [];
let selectedRequirement = [];

// Function to render selected skill tags
function renderTags(type) {
    if (type === "skills") {
        skillTags.innerHTML = "";
        selectedSkills.forEach((skill) => {
            const tag = document.createElement("div");
            tag.classList.add("skill-tag");
            tag.innerHTML = `
                        <span>${skill}</span>
                        <span class="remove-btn" onclick="removeTag('${skill}','${type}')">X</span>
                    `;
            skillTags.appendChild(tag);
        });
    } else if (type === "specials") {
        specialTags.innerHTML = "";
        selectedSpecials.forEach((special) => {
            const tag = document.createElement("div");
            tag.classList.add("special-tag");
            tag.innerHTML = `
                        <span>${special}</span>
                        <span class="remove-btn" onclick="removeTag('${special}','${type}')">X</span>
                    `;
            specialTags.appendChild(tag);
        });
    } else if (type === "responsibility") {
        responsibilityTags.innerHTML = "";
        selectedResponsibility.forEach((responsibility) => {
            const tag = document.createElement("div");
            tag.classList.add("responsibility-tag");
            tag.innerHTML = `
                        <span>${responsibility}</span>
                        <span class="remove-btn" onclick="removeTag('${responsibility}','${type}')">X</span>
                    `;
            responsibilityTags.appendChild(tag);
        });
    } else if (type === "requirement") {
        requirementTags.innerHTML = "";
        selectedRequirement.forEach((requirement) => {
            const tag = document.createElement("div");
            tag.classList.add("requirement-tag");
            tag.innerHTML = `
                        <span>${requirement}</span>
                        <span class="remove-btn" onclick="removeTag('${requirement}','${type}')">X</span>
                    `;
            requirementTags.appendChild(tag);
        });
    }
}

// Function to add a skill to the selected skills array
function addSuggestion(suggestion, type) {
    if (type === "skills") {
        if (!selectedSkills.includes(suggestion)) {
            selectedSkills.push(suggestion);
            renderTags(type);
            skillInput.value = ""; // Clear input after adding
        }
        suggestionsSkillList.style.display = "none"; // Hide suggestions after selecting
    } else if (type === "specials") {
        if (!selectedSpecials.includes(suggestion)) {
            selectedSpecials.push(suggestion);
            renderTags(type);
            specialInput.value = ""; // Clear input after adding
        }
        suggestionsSpecialList.style.display = "none"; // Hide suggestions after selecting
    } else if (type === "responsibility") {
        if (!selectedResponsibility.includes(suggestion)) {
            selectedResponsibility.push(suggestion);
            renderTags(type);
            responsibilityInput.value = ""; // Clear input after adding
        }
        suggestionsResponsibilityList.style.display = "none"; // Hide suggestions after selecting
    } else if (type === "requirement") {
        if (!selectedRequirement.includes(suggestion)) {
            selectedRequirement.push(suggestion);
            renderTags(type);
            requirementInput.value = ""; // Clear input after adding
        }
        suggestionsRequirementList.style.display = "none"; // Hide suggestions after selecting
    }
}
// Function to remove a skill
function removeTag(tag, type) {
    if (type === "skills") {
        selectedSkills = selectedSkills.filter((s) => s !== tag);
    } else if (type === "specials") {
        selectedSpecials = selectedSpecials.filter((s) => s !== tag);
    } else if (type === "responsibility") {
        selectedResponsibility = selectedResponsibility.filter(
            (s) => s !== tag
        );
    } else if (type === "requirement") {
        selectedRequirement = selectedRequirement.filter((s) => s !== tag);
    }
    renderTags(type);
}

// Function to display suggestions based on input
function showSuggestions(type) {
    let inputText;
    let filteredSuggestions;
    let suggestionsList;
    if (type === "skills") {
        inputText = skillInput.value.trim().toLowerCase();
        filteredSuggestions = suggestionsSkills.filter(
            (skill) =>
                skill.toLowerCase().includes(inputText) &&
                !selectedSkills.includes(skill)
        );
        suggestionsList = suggestionsSkillList;

        // Add the current input if it doesn't exist in the suggestions
        if (
            inputText &&
            !suggestionsSkills.some((item) => item.toLowerCase() === inputText)
        ) {
            filteredSuggestions.push(inputText);
        }
    }
    if (type === "specials") {
        inputText = specialInput.value.trim().toLowerCase();
        filteredSuggestions = suggestionsSpecials.filter(
            (special) =>
                special.toLowerCase().includes(inputText) &&
                !selectedSpecials.includes(special)
        );
        suggestionsList = suggestionsSpecialList;

        // Add the current input if it doesn't exist in the suggestions
        if (
            inputText &&
            !suggestionsSpecials.some(
                (item) => item.toLowerCase() === inputText
            )
        ) {
            filteredSuggestions.push(inputText);
        }
    }
    if (type === "responsibility") {
        inputText = responsibilityInput.value.trim().toLowerCase();
        filteredSuggestions = suggestionsResponsibility.filter(
            (responsibility) =>
                responsibility.toLowerCase().includes(inputText) &&
                !selectedResponsibility.includes(responsibility)
        );
        suggestionsList = suggestionsResponsibilityList;

        // Add the current input if it doesn't exist in the suggestions
        if (
            inputText &&
            !suggestionsResponsibility.some(
                (item) => item.toLowerCase() === inputText
            )
        ) {
            filteredSuggestions.push(inputText);
        }
    } else if (type === "requirement") {
        inputText = requirementInput.value.trim().toLowerCase();
        filteredSuggestions = suggestionsRequirement.filter(
            (requirement) =>
                requirement.toLowerCase().includes(inputText) &&
                !selectedRequirement.includes(requirement)
        );
        suggestionsList = suggestionsRequirementList;

        // Add the current input if it doesn't exist in the suggestions
        if (
            inputText &&
            !suggestionsRequirement.some(
                (item) => item.toLowerCase() === inputText
            )
        ) {
            filteredSuggestions.push(inputText);
        }
    }

    // Clear and populate the suggestions list
    suggestionsList.innerHTML = "";
    filteredSuggestions.forEach((suggestion) => {
        const listItem = document.createElement("li");
        listItem.textContent = suggestion;
        listItem.onclick = () => addSuggestion(suggestion, type);
        suggestionsList.appendChild(listItem);
    });

    // Show or hide the suggestions list
    if (filteredSuggestions.length > 0) {
        suggestionsList.style.display = "block";
    } else {
        suggestionsList.style.display = "none";
    }
}

// Add custom skills to the list
function handleKeyDown(event, type) {
    // When the user presses enter, we add the custom skill (if not already added)
    if (event.key === "Enter") {
        if (type === "skills") {
            const customSkill = skillInput.value.trim();
            if (customSkill && !selectedSkills.includes(customSkill)) {
                addSuggestion(customSkill, "skills");
            }
        } else if (type === "specials") {
            const customSkill = specialInput.value.trim();
            if (customSkill && !selectedSpecials.includes(customSkill)) {
                addSuggestion(customSkill, "specials");
            }
        } else if (type === "responsibility") {
            const customSkill = responsibilityInput.value.trim();
            if (customSkill && !selectedResponsibility.includes(customSkill)) {
                addSuggestion(customSkill, "responsibility");
            }
        } else if (type === "requirement") {
            const customSkill = requirementInput.value.trim();
            if (customSkill && !selectedRequirement.includes(customSkill)) {
                addSuggestion(customSkill, "requirement");
            }
        }
        event.preventDefault(); // Prevent form submission on Enter
    }
}
// Close the suggestions list when clicking outside
document.addEventListener("click", (event) => {
    if (!event.target.closest(".responsibility-input-container")) {
        suggestionsResponsibilityList.style.display = "none";
    }
    if (!event.target.closest(".requirement-input-container")) {
        suggestionsRequirementList.style.display = "none";
    }
    if (!event.target.closest(".skills-input-container")) {
        suggestionsSkillList.style.display = "none";
    }
    if (!event.target.closest(".special-input-container")) {
        suggestionsSpecialList.style.display = "none";
    }
});
function submitForm(type) {
    if (type === "skills") {
        hiddenSkillInput.value = JSON.stringify(selectedSkills);
        formSkills.submit();
    } else if (type === "specials") {
        hiddenSpecialInput.value = JSON.stringify(selectedSpecials);
        formSpecials.submit();
    } else if (type === "responsibility") {
        hiddenResponsibilityInput.value = JSON.stringify(
            selectedResponsibility
        );
        hiddenRequirementInput.value = JSON.stringify(selectedRequirement);
        formResponsibility.submit();
    }
}
function renderOldTags(data, type) {
    if (type == "responsibility") {
        responsibilityTags.innerHTML = "";
        selectedResponsibility = data;
        selectedResponsibility.forEach((responsibility) => {
            const tag = document.createElement("div");
            tag.classList.add("responsibility-tag");
            tag.innerHTML = `
                            <span>${responsibility}</span>
                            <span class="remove-btn" onclick="removeTag('${responsibility}','responsibility')">X</span>
                        `;
            responsibilityTags.appendChild(tag);
        });
    } else if (type == "requirement") {
        requirementTags.innerHTML = "";
        selectedRequirement = data;
        selectedRequirement.forEach((requirement) => {
            const tag = document.createElement("div");
            tag.classList.add("requirement-tag");
            tag.innerHTML = `
                            <span>${requirement}</span>
                            <span class="remove-btn" onclick="removeTag('${requirement}','requirement')">X</span>
                        `;
            requirementTags.appendChild(tag);
        });
    } else if (type == "skill") {
        skillTags.innerHTML = "";
        selectedSkills = data;
        selectedSkills.forEach((skill) => {
            const tag = document.createElement("div");
            tag.classList.add("skill-tag");
            tag.innerHTML = `
                            <span>${skill}</span>
                            <span class="remove-btn" onclick="removeTag('${skill}','skill')">X</span>
                        `;
            skillTags.appendChild(tag);
        });
    } else if (type == "special") {
        specialTags.innerHTML = "";
        selectedSpecials = data;
        selectedSpecials.forEach((special) => {
            const tag = document.createElement("div");
            tag.classList.add("special-tag");
            tag.innerHTML = `
                            <span>${special}</span>
                            <span class="remove-btn" onclick="removeTag('${special}','specials')">X</span>
                        `;
            specialTags.appendChild(tag);
        });
    }
}
